<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        // dd([
        //     'tutti_i_parametri_della_query_string' => request()->all(),
        //     'singolo_parametro_name' => request()->input('name'),
        // ]);

        /*
            In ogni caso:
            - Creerò una query
            - Eseguirò quella query

            In alcuni casi:
            - Filtrare la query per nome
            - Filtrare la query per email
        */

        // Creo la query inizializzandola con qualcosa di certo (semplicemente perché è una cosa che devo fare a prescindere e questo è uno dei modi per farlo)
        // Qualcosa di certo nel senso che so di sicuro che mi serve a prescindere
        $contactsQuery = Contact::select('*');

        // dd('POST INIZIALIZZAZIONE', $contactsQuery->toSql());

        $queryStringParams = request()->all();

        // Se devo, filtro per nome
        if (isset($queryStringParams['name'])) {
            $contactsQuery->where('name', 'LIKE', '%'.$queryStringParams['name'].'%');
        }

        // dd('POST FILTRAGGIO PER NAME', $contactsQuery->toSql());

        // Se devo, filtro per email
        if (isset($queryStringParams['email'])) {
            $contactsQuery->where('email', 'LIKE', '%'.$queryStringParams['email'].'%');
        }

        // dd('POST FILTRAGGIO PER EMAIL', $contactsQuery->toSql());

        // Eseguo la query
        $contacts = $contactsQuery->get();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index');
    }

}
