<?php
namespace App\Repositories;

use App\Models\OrderItemsModel;

class OrderItemRepository {
    private $orderItemModel;


    public function __construct(OrderItemsModel $orderItemModel) {
        $this->orderItemModel = $orderItemModel;
    }
}
?>
