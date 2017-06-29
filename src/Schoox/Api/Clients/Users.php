<?php

namespace Schoox\Api\Clients;

use Schoox\Api\Models\User;
use Schoox\Api\Models\NewUser;

class Users extends SchooxApiBase
{
    public function getAndEnumerateAllUsers($role, $past = null, $search = null,
        $aboveId = null, $unitId = null, $jobId = null, $limit = 1000)
    {
        $start = 0;
        $lastTotal = 0;
        $request = $this->service->generateBaseRequest('users');
        $request->addNonBlankQueryString('role', $role);
        $request->addNonBlankQueryString('past', $past);
        $request->addNonBlankQueryString('search', $search);
        $request->addNonBlankQueryString('aboveId', $aboveId);
        $request->addNonBlankQueryString('unitId', $unitId);
        $request->addNonBlankQueryString('jobId', $jobId);
        $request->addNonBlankQueryString('start', $start);
        $request->addNonBlankQueryString('limit', $limit);

        $bigAUserList = [];
        for ($start = 0; $lastTotal <= $limit; $start+=$limit) {
            $request->addNonBlankQueryString('start', $start);
            $response = $this->service->executeRequest($request);
            if (!$response->hasErrors()) {
                $items = $response->getBody();
                $lastTotal = count($items);
                foreach ($items AS $item) {
                    $bigAUserList[] = User::createFromArray((array)$item);
                }
            }
            else throw new \Exception($response->getBody());

            if ($lastTotal < $limit) {
                break;
            }
        }
        return $bigAUserList;
    }

    public function getUsers($role, $past = null, $search = null,
        $aboveId = null, $unitId = null, $jobId = null, $start = null,
        $limit = null)
    {
        $request = $this->service->generateBaseRequest('users');
        $request->addNonBlankQueryString('role', $role);
        $request->addNonBlankQueryString('past', $past);
        $request->addNonBlankQueryString('search', $search);
        $request->addNonBlankQueryString('aboveId', $aboveId);
        $request->addNonBlankQueryString('unitId', $unitId);
        $request->addNonBlankQueryString('jobId', $jobId);
        $request->addNonBlankQueryString('start', $start);
        $request->addNonBlankQueryString('limit', $limit);
        $response = $this->service->executeRequest($request);
        if (!$response->hasErrors()) {
            $items = $response->getBody();
            $result = [];
            foreach ($items AS $item) {
                $result[] = User::createFromArray((array)$item);
            }
            return $result;
        }
        else throw new \Exception($response->getBody());
    }

    public function getDetailsOfUser($userId, $externalId = null)
    {
        $request = $this->service->generateBaseRequest('users/' . $userId);
        $request->addNonBlankQueryString('externalId', $externalId);
        $response = $this->service->executeRequest($request);
        if (!$response->hasErrors()) {
            return  User::createFromArray((array)$response->getBody());
        }
        else throw new \Exception($response->getBody());
    }

    public function createAndAddUser(NewUser $user)
    {
        $request = $this->service->generateBaseRequest('users');
        $response = $this->service->executePostRequest($request, $user->toJson());
        if ($response->hasErrors()) {
            throw new \Exception($response->getBody()->error);
        }
        unset($response->status);
        return User::createFromArray((array)$response->getBody());
    }

    public function editUser($userId, NewUser $user, $externalId = null)
    {
        $request = $this->service->generateBaseRequest('users/' . $userId);
        $request->addNonBlankQueryString('external_id', $externalId);
        $result = $this->service->executePutRequest($request, $user->toJson());
        if ($result->hasErrors()) {
            throw new \Exception($result->getBody()->error);
        }
        if ($result->getStatusCode() === 204) {
            return true;
        }
        throw new \LogicException(sprintf('Unexpected result. Received status code: %d', $result->getStatusCode()));
    }

    public function removeUser($userId, $externalId = null)
    {
        $request = $this->service->generateBaseRequest('users/' . $userId);
        $request->addNonBlankQueryString('external_id', $externalId);
        $result = $this->service->executeDeleteRequest($request);
        if ($result->hasErrors()) {
            throw new Exception($result->getBody()->error);
        }
        if ($result->getStatusCode() === 204) {
            return true;
        }
        throw new \LogicException(sprintf('Unexpected result. Received status code: %d', $result->getStatusCode()));
    }

    public function reactivateUser($mixedId, $externalId = false)
    {
        $request = $this->service->generateBaseRequest('users');
        $body = $externalId ? ['external_id' => $mixedId] : ['id' => $mixedId];
        $result = $this->service->executePostRequest($request, json_encode($body));
        if ($result->hasErrors()) {
            throw new Exception($result->getBody()->error);
        }
        if ($result->getStatusCode() === 201) {
            return true;
        }
        throw new \LogicException(sprintf('Unexpected result. Received status code: %d', $result->getStatusCode()));
    }

    public function updateUserRoles($userId, array $roles, $externalId = null)
    {
        $request = $this->service->generateBaseRequest('users/' . $userId . '/roles');
        $request->addNonBlankQueryString('external_id', $externalId);
        $result = $this->service->executePutRequest($request, json_encode($roles));
        if ($result->hasErrors()) {
            throw new Exception($result->getBody()->error);
        }
        if ($result->getStatusCode() === 200) {
            return true;
        }
        throw new \LogicException(sprintf('Unexpected result. Received status code: %d', $result->getStatusCode()));
    }
}
