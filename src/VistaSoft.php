<?php


namespace EdyWladson\VistaSoft;


/**
 * Class VistaSoft
 * @package EdyWladson\VistaSoft
 */
class VistaSoft
{
    /** @var string */
    private $apiUrl;

    /** @var string */
    private $apiKey;

    /** @var string */
    private $endpoint;

    /** @var array */
    private $build;

    /** @var string */
    private $showtotal;

    /** @var string */
    private $immobileId;

    /** @var string */
    private $clientId;

    /** @var mixed */
    private $callback;

    /**
     * VistaSoft constructor.
     * @param string $apiUrl
     * @param string $apiKey
     */
    public function __construct(string $apiUrl, string $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields): VistaSoft
    {
        $this->build = [
            "fields" => $fields
        ];

        return $this;
    }

    /**
     * @param array $leads
     * @return $this
     */
    public function leads(array $leads): VistaSoft
    {
        $this->build = [
            "lead" => $leads
        ];

        return $this;
    }

    /**
     * @param array $filterBy
     * @return $this
     */
    public function filter(array $filterBy): VistaSoft
    {
        if(empty($this->build)){
            $this->build = [
                "filter" => $filterBy
            ];
            return $this;
        }

        $this->build += [
            "filter" => $filterBy
        ];
        return $this;
    }

    /**
     * @param array $orderBy
     * @return $this
     */
    public function order(array $orderBy): VistaSoft
    {
        $this->build += [
            "order" => $orderBy
        ];

        return $this;
    }

    /**
     * @param int $page
     * @param int $quantity
     * @param bool $total
     * @return $this
     */
    public function paginator(int $page = 1, int $quantity = 20, bool $total = false): VistaSoft
    {
        $this->showtotal = ($total) ? "&showtotal=1" : '';
        $this->build += [
            "paginacao" => [
                "pagina" => $page,
                "quantidade" => $quantity
            ]
        ];

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function clientId(int $id): VistaSoft
    {
        $this->clientId = "&cliente={$id}";
        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function immobileId(int $id): VistaSoft
    {
        $this->immobileId = "&imovel={$id}";
        return $this;
    }

    /**
     * @param string $endpoint
     * @return $this
     */
    public function endpoint(string $endpoint): VistaSoft
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return mixed
     */
    public function callback()
    {
        return $this->callback;
    }

    /**
     * GET
     * @return $this
     */
    public function get(): VistaSoft
    {
        $url = "{$this->apiUrl}{$this->endpoint}?key={$this->apiKey}";
        $fields = json_encode($this->build);
        $url .= "&pesquisa={$fields}{$this->showtotal}{$this->clientId}{$this->immobileId}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
        return $this;
    }

    /**
     * POST
     * @return $this
     */
    public function post(): VistaSoft
    {
        $url = "{$this->apiUrl}{$this->endpoint}?key={$this->apiKey}";
        $fields = "cadastro=" . json_encode($this->build);
        $url .= "{$this->clientId}{$this->immobileId}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Content-Length: ' . strlen($fields)
        ]);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
        return $this;
    }

    /**
     * PUT
     * @return $this
     */
    public function put(): VistaSoft
    {
        $url = "{$this->apiUrl}{$this->endpoint}?key={$this->apiKey}";
        $fields = "cadastro=" . json_encode($this->build);
        $url .= "{$this->clientId}{$this->immobileId}";

        var_dump($fields);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Content-Length: ' . strlen($fields)
        ]);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
        return $this;
    }
}