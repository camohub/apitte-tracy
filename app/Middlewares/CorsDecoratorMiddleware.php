<?php
class CorsDecorator implements IDecorator
{
    /**
     * @param ServerRequestInterface|ApiRequest $request
     * @param ResponseInterface $response
     * @param mixed[] $context
     * @return ResponseInterface
     */
    public function decorate(ServerRequestInterface $request, ResponseInterface $response, array $context = [])
    {
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Credentials', 'true')
            ->withHeader('Access-Control-Allow-Methods', 'GET', 'POST, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'Accept, Overwrite, Destination, Content-Type, Depth, User-Agent, Translate, Range, Content-Range, Timeout, X-Requested-With, If-Modified-Since, Cache-Control, Location')
            ->withHeader('Access-Control-Max-Age', 1728000);
    }
}