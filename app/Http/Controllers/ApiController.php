<?

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class ApiController extends Controller {

    protected $statusCode = 200;

    const HTTP_NOT_FOUND = 404;
    /**
     * Get the value of statusCode
     */ 
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the value of statusCode
     *
     * @return  self
     */ 
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found !'){
        return $this->setStatusCode(self::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error'){
        return $this->setStatusCode(500)->respondWithError($message);
    }



    /**
     * @param $data
     * @param $headers array
     * @return mixed
     */
    public function respond($data, $headers = []){
        
        return Response::json($data, $this->getStatusCode(), $headers); 
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message){
        return $this->respond([
            'error' => [
                'message'       => $message,
                'status_code'   => $this->getStatusCode(),
            ]
        ]);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondCreated($message){
        return $this->setStatusCode(201)->respond([
            'message'   => $message,
            'status'    => 'success'
        ]);
    }    
}