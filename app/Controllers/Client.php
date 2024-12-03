<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\VoitureModel;
use CodeIgniter\Email\Email;
use Dompdf\Dompdf;


class Client extends BaseController
{
    public function __construct()
    {
        helper(['url']);
        $this->client = new ClientModel();
        $this->vehicule = new VoitureModel();
    }

    public function form()
    {
        // Load the Voiture model (assuming you have a VoitureModel)
        $vehiculesDisponibles = model('VoitureModel')->where('status', 'disponible')->findAll();
    
        // Pass the data to the view
        return view('client/form', ['vehiculesDisponibles' => $vehiculesDisponibles]);
    }

    public function table()
    {
        // Get all clients
        $data['client'] = $this->client->findAll();
        
        // Return the table view with the client data
        return view('client/table', $data);
    }

    public function SaveClient()
    {
        // Retrieve input data from the form
        $cin = $this->request->getVar('cin');
        $nom = $this->request->getVar('nom');
        $prenom = $this->request->getVar('prenom');
        $Email = $this->request->getVar('Email');
        $id_voiture = $this->request->getVar('id_voiture');
        $date_vonte = $this->request->getVar('date_vonte');

        // Save the client data with the vehicle ID
        $this->client->save([
            "cin" => $cin,
            "nom" => $nom,
            "prenom" => $prenom,
            "Email" => $Email,
            "id_voiture" => $id_voiture,
            "date_vonte" => $date_vonte
        ]);

        session()->setFlashdata("success", "Client added successfully.");
        return redirect()->to(base_url('client/table'));
    }














    public function edit($id)
    {
        // Get client information by ID
        $clientInfo = $this->client->find($id);
        if (!$clientInfo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Client with ID $id not found");
        }

        // Get available vehicles (status 'disponible')
        $vehiculesDisponibles = $this->vehicule->where('status', 'disponible')->findAll();

        // Pass client data and available vehicles to the view
        $data = [
            'clientInfo' => $clientInfo,
            'vehiculesDisponibles' => $vehiculesDisponibles
        ];

        return view('client/edit', $data);
    }

    public function updateClient($id)
    {
        // Retrieve input data from the form
        $cin = $this->request->getVar('cin');
        $nom = $this->request->getVar('nom');
        $prenom = $this->request->getVar('prenom');
        $Email = $this->request->getVar('Email');
        $id_voiture = $this->request->getVar('id_voiture');
        $date_vonte = $this->request->getVar('date_vonte');

        // Prepare data for updating client
        $data = [
            'cin' => $cin,
            'nom' => $nom,
            'prenom' => $prenom,
            'Email' => $Email,
            'id_voiture' => $id_voiture,
            'date_vonte' => $date_vonte
        ];

        // Update client data in database
        $this->client->update($id, $data);

        // Redirect with success message
        session()->setFlashdata("success", "Client data updated successfully.");
        return redirect()->to(base_url('client/table'));
    }











 


    public function deleteClient($id)
    {
        // Verify if client exists
        $clientInfo = $this->client->find($id);
        if (!$clientInfo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Client with ID $id not found");
        }

        // Delete client from the database
        $this->client->delete($id);

        // Redirect with success message
        session()->setFlashdata("success", "Client deleted successfully.");
        return redirect()->to(base_url('client/table'));
    }









 



   

    public function pdfFacture($id)
    {
        // Fetch the client information by ID
        $client = $this->client->find($id);
    
        if (!$client) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Client with ID $id not found.");
        }
    
        // Fetch the voiture (car) information based on the `id_voiture` in the client data
        $voiture = $this->vehicule->find($client['id_voiture']);
    
        if (!$voiture) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Voiture with ID {$client['id_voiture']} not found.");
        }
    
        // Initialize Dompdf
        $dompdf = new Dompdf();
    
        // Get the current date (date of facture generation)
        $currentDate = date('Y-m-d');
    
        // Prepare HTML content for the PDF, including the new fields
        $html = '
            <h1>Facture - Vente de Voiture</h1>
            <p><strong>Date de la facture : </strong>' . $currentDate . '</p>
            <hr>
            <h2>Informations du Client</h2>
            <p><strong>Nom: </strong>' . $client['nom'] . '</p>
            <p><strong>Prénom: </strong>' . $client['prenom'] . '</p>
            <p><strong>Email: </strong>' . $client['Email'] . '</p>
            <hr>
            <h2>Informations de la Voiture</h2>
            <p><strong>ID Voiture: </strong>' . $client['id_voiture'] . '</p>
            <p><strong>Marque: </strong>' . $voiture['marque'] . '</p>
             <p><strong>Marque: </strong>' . $voiture['prix'] . '$</p>
            <p><strong>Date de Vente: </strong>' . $client['date_vonte'] . '</p>
        ';
    
        // Load HTML into Dompdf
        $dompdf->loadHtml($html);
    
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the PDF
        $dompdf->render();
    
        // Output the PDF to download
        $dompdf->stream("Facture_Client_{$client['nom']}_{$client['prenom']}.pdf", ['Attachment' => 1]);
    }
    




   

    

    
    

}
