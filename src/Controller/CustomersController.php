<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use App\Model\Table\CustomersTable;

class CustomersController extends AppController
{


    public function index()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $customers = $this->Customers->find()->toArray();
        $user = $this->getTableLocator()->get("Users");
        $current_user = $user->findById($this->request->getSession()->read("id"))->contain("Profiles")->first();
        $this->set("title", "Customers");
        $this->set("initials", $current_user->profile->initials);
        $this->viewBuilder()->setLayout("base");
        $this->set("customers", $customers);
        $this->paginate = [
            'limit' => 10,
            'order' => [
                'Customers.id' => 'asc'
            ]
        ];
        $customer = $this->paginate($this->Customers);
        $this->set(compact('customers'));
    }

    public function view($id)

    {
        $customer = $this->Customers->get($id);
        $this->set(compact('customer'));
    }
    public function delete($id)
    {
        $entity = $this->Customers->get($id);
        $result = $this->Customers->delete($entity);
        return $this->redirect(["action" => "/index/"]);
    }

    public function getCustomersData()
    {
        $this->autoRender = false;
        $this->response = $this->response->withType('application/json');

        $query = $this->Customers->find();

        $searchValue = '';
        if (array_key_exists('search', $this->request->getQuery())) {
            $searchValue = $this->request->getQuery('search')['value'];
            $query->where([
                'OR' => [
                    'firstname LIKE' => '%' . $searchValue . '%',
                    'lastname LIKE' => '%' . $searchValue . '%',
                ]
            ]);
        }

        $start = $this->request->getQuery('start', 0);
        $length = $this->request->getQuery('length', 10);
        $query->limit($length)->offset($start);

        $orderBy = '';
        $orderDir = '';
        if (array_key_exists('order', $this->request->getQuery())) {
            $orderBy = $this->request->getQuery('order')[0]['column'];
            $orderDir = $this->request->getQuery('order')[0]['dir'];
            if (!empty($orderBy) && !empty($orderDir)) {
                $columns = $this->Customers->schema()->columns();
                $query->order([$columns[$orderBy] => $orderDir]);
            }
        }

        $customers = $query->toArray();
        $filteredRecords = $this->Customers->find()->count();
        $totalRecords = $this->Customers->find()->count();

        $data = array('data' => $customers, 'length' => count($customers));

        $jsonData = [
            'draw' => intval($this->request->getQuery('draw')),
            'recordsTotal' => intval($totalRecords),
            'recordsFiltered' => intval($filteredRecords),
            'data' => $data
        ];

        $this->response = $this->response->withStringBody(json_encode($jsonData));
        return $this->response;
    }


    public function edit($id)
    {

        $customer = $this->Customers->get($id);
        $users = $this->Customers->Users->find('list', ['limit' => 200]);

        if ($this->request->is('patch', 'put', 'post')) {

            $data = $this->request->getData();

            $customer = $this->Customers->patchEntity($customer, $data);
            if ($this->Customers->save($customer)) {

                $this->Flash->success('Clientul a fost actualizat.');
                return $this->redirect(['action' => '/index/']);
            } else {

                $this->Flash->error('A apărut o eroare la actualizarea clientului.');
            }
        }

        $this->set(compact('customer', 'users'));
    }
    public function add()
    {
        $customer = $this->Customers->newEmptyEntity();
        $user = $this->getTableLocator()->get("Users");
        $current_user = $user->findById($this->request->getSession()->read("id"))->contain("Profiles")->first();
        if ($this->request->is("post")) {
            $this->Customers->patchEntity($customer, $this->request->getData());
            $customer->user_id = $this->request->getSession()->read("id");
            if ($this->Customers->save($customer)) {

                $this->Flash->success(("Clientul s-a adaugat cu succes"));
                return $this->redirect(["action" => "/view/" . $customer->id]);
            }

            $this->Flash->error(("Ohh ceva nu e bine :("));
        }
        $this->set("title", "Add Customer");
        $this->set("initials", $current_user->profile->initials);
        $this->viewBuilder()->setLayout("base");
        $this->set("customer", $customer);
    }
}
