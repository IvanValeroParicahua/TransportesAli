<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Carro Controller
 *
 * @property \App\Model\Table\CarroTable $Carro
 *
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarroController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $carro = $this->paginate($this->Carro);

        $this->set(compact('carro'));
    }

    /**
     * View method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carro = $this->Carro->get($id, [
            'contain' => ['Boleto']
        ]);

        $this->set('carro', $carro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carro = $this->Carro->newEntity();
        if ($this->request->is('post')) {
            $carro = $this->Carro->patchEntity($carro, $this->request->getData());
            if ($this->Carro->save($carro)) {
                $this->Flash->success(__('The carro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carro could not be saved. Please, try again.'));
        }
        $this->set(compact('carro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carro = $this->Carro->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carro = $this->Carro->patchEntity($carro, $this->request->getData());
            if ($this->Carro->save($carro)) {
                $this->Flash->success(__('The carro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carro could not be saved. Please, try again.'));
        }
        $this->set(compact('carro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carro = $this->Carro->get($id);
        if ($this->Carro->delete($carro)) {
            $this->Flash->success(__('The carro has been deleted.'));
        } else {
            $this->Flash->error(__('The carro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
