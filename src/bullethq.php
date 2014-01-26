<?php
namespace bullethq;


class bullethq
{

    /**
     * The URL being requested.
     */
    public $request_url = 'https://accounts-app.bullethq.com/api/v1/';

    /**
     * The Headers to send
     */
    public $post_headers = array('Content-Type: application/json');

    /**
     * The state of debug mode
     */
    public $debug_mode = TRUE;

    /**
     * The username to use for the request
     */
    public $username = NULL;

    /**
     * The password to use for the request
     */
    public $password = NULL;

    /**
     * Initialise the class and set a username/password to use throughout
     *
     * @param string $username
     * @param string $password
     */
    public function __construct($username = '', $password = '')
    {
        $this->username = $username;
        $this->password = $password;

        $this->debug_mode = TRUE;

        return $this;

    }

    /**
     * Prepare the call to send to the API
     *
     * @param $endpoint
     * @param string $record_id
     * @return mixed
     */
    public function get($endpoint, $record_id = '')
    {
        if ($record_id === '') {
            $response = $this->curl_request($endpoint);
        } else {
            $response = $this->curl_request($endpoint . '/' . $record_id);
        }

        return json_decode($response, TRUE);
    }

    /**
     * Prepare to send new data to the API
     *
     * @param $endpoint
     * @param $new_data
     * @return mixed
     */
    public function post($endpoint, $new_data)
    {
        $response = $this->curl_request($endpoint, json_encode($new_data));

        return json_decode($response, TRUE);

    }

    /**
     * Delete data from the API
     *
     * @param $endpoint
     * @param $record_id
     * @return mixed
     */
    public function delete($endpoint, $record_id)
    {
        $response = $this->curl_request($endpoint . '/' . $record_id, '', TRUE);

        return json_decode($response, TRUE);
    }

    /**
     * Perform the request to the endpoint and return a response
     *
     * @param string $endpoint
     * @return mixed
     * @throws cURL_Exception
     */
    private function curl_request($endpoint = '', $new_data = '', $delete = false)
    {
        $curl_handle = curl_init();

        curl_setopt($curl_handle, CURLOPT_URL, $this->request_url . $endpoint);
        curl_setopt($curl_handle, CURLOPT_HEADER, FALSE);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl_handle, CURLOPT_TIMEOUT, 120);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl_handle, CURLOPT_USERPWD, $this->username . ':' . $this->password);
        curl_setopt($curl_handle, CURLOPT_VERBOSE, $this->debug_mode);

        if ($delete == true) {
            curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

        if ($new_data != '') {
            curl_setopt($curl_handle, CURLOPT_POST, 1);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $new_data);
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $this->post_headers);
        }

        $this->response = curl_exec($curl_handle);

        if ($this->response === FALSE) {
            throw new cURL_Exception('cURL resource: ' . (string)$curl_handle . '; cURL error: ' . curl_error($curl_handle) . ' (cURL error code ' . curl_errno($curl_handle));
        }

        return $this->response;
    }
} 