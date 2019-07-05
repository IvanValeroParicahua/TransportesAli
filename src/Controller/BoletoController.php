<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Boleto Controller
 *
 * @property \App\Model\Table\BoletoTable $Boleto
 *
 * @method \App\Model\Entity\Boleto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoletoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Destinos', 'Carros', 'Reservas']
        ];
        $boleto = $this->paginate($this->Boleto);

        $this->set(compact('boleto'));
    }

    /**
     * View method
     *
     * @param string|null $id Boleto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $boleto = $this->Boleto->get($id, [
            'contain' => ['Destinos', 'Carros', 'Reservas']
        ]);

        $this->set('boleto', $boleto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $boleto = $this->Boleto->newEntity();
        if ($this->request->is('post')) {
            $boleto = $this->Boleto->patchEntity($boleto, $this->request->getData());
            if ($this->Boleto->save($boleto)) {
                $this->Flash->success(__('The boleto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The boleto could not be saved. Please, try again.'));
        }
        $destinos = $this->Boleto->Destinos->find('list', ['limit' => 200]);
        $carros = $this->Boleto->Carros->find('list', ['limit' => 200]);
        $reservas = $this->Boleto->Reservas->find('list', ['limit' => 200]);
        $this->set(compact('boleto', 'destinos', 'carros', 'reservas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Boleto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $boleto = $this->Boleto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $boleto = $this->Boleto->patchEntity($boleto, $this->request->getData());
            if ($this->Boleto->save($boleto)) {
                $this->Flash->success(__('The boleto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The boleto could not be saved. Please, try again.'));
        }
        $destinos = $this->Boleto->Destinos->find('list', ['limit' => 200]);
        $carros = $this->Boleto->Carros->find('list', ['limit' => 200]);
        $reservas = $this->Boleto->Reservas->find('list', ['limit' => 200]);
        $this->set(compact('boleto', 'destinos', 'carros', 'reservas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Boleto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $boleto = $this->Boleto->get($id);
        if ($this->Boleto->delete($boleto)) {
            $this->Flash->success(__('The boleto has been deleted.'));
        } else {
            $this->Flash->error(__('The boleto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
