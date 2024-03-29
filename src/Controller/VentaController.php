<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Venta Controller
 *
 * @property \App\Model\Table\VentaTable $Venta
 *
 * @method \App\Model\Entity\Ventum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VentaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reserva']
        ];
        $venta = $this->paginate($this->Venta);

        $this->set(compact('venta'));
    }

    /**
     * View method
     *
     * @param string|null $id Ventum id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ventum = $this->Venta->get($id, [
            'contain' => ['Reserva']
        ]);

        $this->set('ventum', $ventum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ventum = $this->Venta->newEntity();
        if ($this->request->is('post')) {
            $ventum = $this->Venta->patchEntity($ventum, $this->request->getData());
            if ($this->Venta->save($ventum)) {
                $this->Flash->success(__('The ventum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ventum could not be saved. Please, try again.'));
        }
        $reserva = $this->Venta->Reserva->find('list', ['limit' => 200]);
        $this->set(compact('ventum', 'reserva'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ventum id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ventum = $this->Venta->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ventum = $this->Venta->patchEntity($ventum, $this->request->getData());
            if ($this->Venta->save($ventum)) {
                $this->Flash->success(__('The ventum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ventum could not be saved. Please, try again.'));
        }
        $reserva = $this->Venta->Reserva->find('list', ['limit' => 200]);
        $this->set(compact('ventum', 'reserva'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ventum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ventum = $this->Venta->get($id);
        if ($this->Venta->delete($ventum)) {
            $this->Flash->success(__('The ventum has been deleted.'));
        } else {
            $this->Flash->error(__('The ventum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
