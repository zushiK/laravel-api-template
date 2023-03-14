<?php

namespace App\Services;

use App\Repositories\Repository;

class Service
{
    /**
     * 継承元でrepositoryのDIを行う
     *
     * @var Repository
     */
    protected $repository;

    /**
     * idから一つ取得
     *
     * @param string $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find(string $id)
    {
        return $this->repository->find($id);
    }

    /**
     * 全件取得
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * 検索
     *
     * @param array $search
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function search($search)
    {
        return $this->repository->search($search);
    }

    /**
     * 新規作成
     *
     * @param array $data
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * 更新
     *
     * @param string $id
     * @param array $data
     * @return Illuminate\Database\Eloquent\Model
     */
    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * 削除
     *
     * @param string $id
     * @param array $data
     * @return void
     */
    public function delete(string $id)
    {
        return $this->repository->delete($id);
    }

    /**
     * アップサート
     * 
     * @param array $conditions 条件
     * @param array $data データ
     * @return Illuminate\Database\Eloquent\Model
     */
    public function upsert(array $conditions, array $data)
    {
        return $this->repository->upsert($conditions, $data);
    }
}
