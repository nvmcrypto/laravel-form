<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Client;

class ClientsController extends Controller //Controller resource
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //var_dump(route('meu-nome'));//exibindo a rota
        $clients = \App\Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create',['client'=>new Client()]);//Passa uma instancia vazia para não da erro no criar com o template do edit
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');//has retorna um valor boolean caso o campo tenha valor ou não.
        Client::create($data); // Desta forma pega o $fillable criado na classe client, se não tiver o fillable da erro se passar campo a mais.
        return redirect()->to('/admin/clients');
        /*$client = new Client(); // Teria que colocar um por um nesse modo
        $client->name = $request->get('name');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)/*edit($id) */
    {
        /*$client = Client::findOrFail($id); -- Substituido pela chamada direta do cliente da classe*/
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client) /*-- Substituido pela chamada direta do cliente da classe - (Route Model Binding Implicito)*/
    {
       /* $client = Client::findOrFail($id);*/
        $this->_validate($request);
        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');//has retorna um valor boolean caso o campo tenha valor ou não.
        $client->fill($data);//metodo fill utiliza o fillabe com os dados confiaveis, não precisando colocar todos os campos manualmente
        $client->save();
        //return redirect()->to('/admin/clients');
        return redirect()->route('clients.index');//Posso utilizar usando diretamente a rota
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function _validate(Request $request){
        $maritalStatus = implode(',',array_keys(Client::MARITAL_STATUS));
        $this->validate($request, [
            'name'=>'required|max:255',
            'document_number'=>'required',
            'email' => 'required|email',
            'phone'=>'required',
            'date_birth'=>'required|date',
            'marital_status'=>"required|in:$maritalStatus",
            'sex'=>'required|in:m,f',
            'physical_disability'=>'max:255'
            //ou'marital_status'=>'required|in:1,2,3'
        ]);
    }
}
