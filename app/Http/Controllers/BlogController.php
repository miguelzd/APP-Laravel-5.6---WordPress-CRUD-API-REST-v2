<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BlogController extends Controller
{

    /**
     * Por default los usuarios WordPress Administrador/Autor/Editor tienen permisos de escritura
     * Por default los usuarios WordPress Colaborador/Suscriptor solo tienen permisos de lectura
     * Importante: las peticiones GET no requiere user/pass solo peticiones de tipo POST/DELETE
     */
    protected $client;
    protected $base_uri = 'http://wordpress.local'; // URL base del sitio
    protected $username = 'wpadmin'; // username de wordpress
    protected $password = 'wpadmin'; // password de wordpress

    /**
     * Create a new GuzzleHttp\Client
     *
     * @param  Client  $client
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = new Client([
            'base_uri' => $this->base_uri,
            'timeout'  => 0,
            'headers' => array(
                'Authorization' => 'Basic ' . base64_encode( $this->username . ':' . $this->password ),
            ),
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        try{
            $response =  $this->client->request('GET', 'wp-json/wp/v2/posts');
            $posts = json_decode($response->getBody()->getContents());
            return view('index', compact('posts'));
        }
        catch(ClientException $e){
            abort(400, ''.$e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        try{
            $this->client->request('POST', 'wp-json/wp/v2/posts', [
                'json' => [
                    'title' => $title, 'content' => $content, 'status' => 'publish'
                ],
            ]);
            return redirect()->route('index');
        }
        catch(ClientException $e){
            abort(400, ''.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // null
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $response = $this->client->request('GET', 'wp-json/wp/v2/posts/'.$id);
            $post = json_decode($response->getBody()->getContents());
            return view('edit', compact('post'));
        }
        catch(ClientException $e){
            abort(400, ''.$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $id = $request->input('id');
            $title = $request->input('title');
            $content = $request->input('content');

            $this->client->request('POST', 'wp-json/wp/v2/posts/'.$id, [
                'json' => [
                    'title' => $title, 'content' => $content,
                ],
            ]);
            return redirect()->route('index');
        }
        catch(ClientException $e){
            abort(400, ''.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->client->request('DELETE', 'wp-json/wp/v2/posts/'.$id);
            return redirect()->route('index');
        }
        catch(ClientException $e){
            abort(400, ''.$e->getMessage());
        }
    }
}
