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
    public function create(Request $request)
    {
        $clientType = Client::getClientType($request->client_type);
        return view('admin.clients.create',['client'=>new Client(),'clientType'=>$clientType]);//Passa uma instancia vazia para não da erro no criar com o template do edit
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->_validate($request);
        $data['defaulter'] = $request->has('defaulter');//has retorna um valor boolean caso o campo tenha valor ou não.
        $data['client_type'] = Client::getClientType($request->client_type);
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
        $clientType = $client->client_type;
        return view('admin.clients.edit', compact('client','clientType'));
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
        $data = $this->_validate($request);
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
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    protected function _validate(Request $request){
       
        $clientType = Client::getClientType($request->client_type);
        $client =  $request->route('client');
        $clientId = $client instanceof Client ? $client->id : null ;
        $rules = [
            'name'=>'required|max:255',
            'document_number'=>"required|unique:clients,document_number,$clientId",
            'email' => 'required|email',
            'phone'=>'required'
        ];
        $maritalStatus = implode(',',array_keys(Client::MARITAL_STATUS));
        $rulesIndividual = [
            'date_birth'=>'required|date',
            'marital_status'=>"required|in:$maritalStatus",
            'sex'=>'required|in:m,f',
            'physical_disability'=>'max:255'
          
        ];
        $rulesLegal = [
            'company_name' => 'required|max:255'
        ];
        return $this->validate($request, $clientType == Client::TYPE_INDIVIDUAL? $rules + $rulesIndividual : $rules + $rulesLegal);
    }
}
