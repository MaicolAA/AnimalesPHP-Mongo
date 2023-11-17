<?php

require __DIR__ . '/../vendor/autoload.php'; 

use MongoDB\Client;

use MongoDB\BSON\ObjectID;

class Animal {
    public $idanimal;
    public $nombre;
    public $descripcion;
    public $edad;
    public $tipo;

    public function __construct($idanimal, $nombre,$tipo, $descripcion, $edad) {
        $this->idanimal = $idanimal;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->edad = $edad;
        
    }

    public function eliminarAnimal()
    {
        $client = new Client("mongodb+srv://maicolaroyave10:Maicol2701@cluster0.odqgsrl.mongodb.net/"); // Ajusta la URL de conexión según tu configuración
        $collection = $client->selectDatabase('animales')->animales; 

        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($this->idanimal)]);

        return $result->getDeletedCount() > 0;
    }
}

class Animals
{
    protected $db;

    public function __construct()
    {
        $client = new Client("mongodb+srv://maicolaroyave10:Maicol2701@cluster0.odqgsrl.mongodb.net/"); 
        $this->db = $client->selectDatabase('animales'); 
    }

    public function getAllAnimals()
    {
        $collection = $this->db->animales; 
        $cursor = $collection->find();
        $animals = [];

        foreach ($cursor as $document) {
            $animal = new Animal(
                $document->_id,
                $document->nombre,
                $document->tipo,
                $document->descripcion,
                $document->edad
                
            );

            $animals[] = $animal;
        }

        return $animals;
    }

    public function saveAnimal($nombre, $tipo, $descripcion, $edad)
    {
        $collection = $this->db->animales; 

        $result = $collection->insertOne([
            'nombre' => $nombre,
            'tipo' => $tipo,
            'descripcion' => $descripcion,
            'edad' => $edad
            
        ]);

        return $result->getInsertedCount() > 0;
    }

    public function editarAnimal($idanimal, $nombre, $tipo,  $descripcion, $edad)
    {
        $collection = $this->db->animales;

        $result = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($idanimal)],
            [
                '$set' => [
                    'nombre' => $nombre,
                    'tipo' => $tipo,
                    'descripcion' => $descripcion,
                    'edad' => $edad
                ],
            ]
        );

        return $result->getModifiedCount() > 0;
    }

    public function getAnimalById($idanimal)
    {
        $collection = $this->db->animales;

        $result = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($idanimal)]);

        if (!$result) {
            return null; 
        }

        $animal = new Animal(
            $result->_id,
            $result->nombre,
            $result->tipo,
            $result->descripcion,
            $result->edad
            
        );

        return $animal;
    }


    public function eliminarAnimal()
    {
        $client = new Client("mongodb+srv://maicolaroyave10:Maicol2701@cluster0.odqgsrl.mongodb.net/"); 
        $collection = $client->selectDatabase('animales')->animales; 

        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($this->idanimal)]);

        return $result->getDeletedCount() > 0;
    }


}
