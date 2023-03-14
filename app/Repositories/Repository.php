<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\ScopedModel;

use Illuminate\Database\Eloquent\Builder;

class Repository
{
    /**
     * 継承元でmodelのDIを行う
     *
     * @var Model|ScopedModel
     */
    protected $model;


    /**
     * 1件取得
     *
     * @param string $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find(string $id)
    {
        return $this->model->find($id);
    }

    /**
     * フィルタ取得
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function search(array $search)
    {
        return $this->searchQuery($search)->get();
    }

    /**
     * @param array $search
     * @return Builder
     */
    protected function searchQuery(array $search = [])
    {
        $qb = $this->model->query();
        foreach ($search as $k => $v) {
            $qb->where($k, $v);
        }

        return $qb;
    }

    /**
     * 全取得
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * 新規作成
     *
     * @param array $data
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * 1件更新
     *
     * @param string $id
     * @param array $data
     * @return Illuminate\Database\Eloquent\Model
     */
    public function update(string $id, array $data)
    {
        $obj = $this->model->where("id", $id)->update($data);
        return $this->model->find($id);
    }

    /**
     * 1件削除
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id)
    {
        return $this->model->where("id", $id)->delete();
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
        return $this->model->updateOrCreate($conditions, $data);
    }
}
