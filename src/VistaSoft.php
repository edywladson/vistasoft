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
    /** @var array */
    private $build;
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
     * @param array $filterBy
     * @return $this
     */
    public function filter(array $filterBy): VistaSoft
    {
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
    public function paginator(int $page = 1, int $quantity = 10, bool $total = false): VistaSoft
    {
        $showtotal = ($total) ? "&showtotal=1" : '';
        $this->build += [
            $showtotal,
            "paginacao" => [
                "pagina" => $page,
                "quantidade" => $quantity
            ]
        ];

        return $this;
    }

    /**
     * @param string $endpoint
     * @return $this
     */
    public function endpoint(string $endpoint): VistaSoft
    {
        $this->apiUrl = "{$this->apiUrl}{$endpoint}";
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
        $url = "{$this->apiUrl}?key={$this->apiKey}";
        $fields = json_encode($this->build);
        $url .= "&pesquisa={$fields}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
        return $this;
    }
}