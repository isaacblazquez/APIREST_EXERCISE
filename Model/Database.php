<?php
class Database
{
    protected $connection = null;
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    	
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }			
    }


    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function delete($query = "" , $params = [])
    {
        var_dump($query);
        var_dump($params);

        try {
            $stmt = $this->executeDeleteStatement( $query , $params );
         
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }


    public function update($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeUpdateStatement( $query , $params );
           
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    private function executeUpdateStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                $stmt->bind_param($params[0], $params[1], $params[2],$params[3],$params[4]);
            }

            if ($stmt->execute()) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Usuario actualizado exitosamente'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Error al actualizar el usuario: ' . $conn->error
                );
            }
            return ($response);

        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                $stmt->bind_param($params[0], $params[1]);
            }
            $stmt->execute();
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }

    private function executeDeleteStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                $stmt->bind_param($params[0], $params[1]);
            }
            
            if ($stmt->execute()) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Usuario borrado exitosamente'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Error al borrar el usuario: ' . $conn->error
                );
            }
            return ($response);
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }
}

?>