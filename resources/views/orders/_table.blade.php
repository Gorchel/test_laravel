<table class="table table-bordered" id="order-content-table">
  	<thead>
      <tr>
        <th>#<i class="fa fa-arrows-v pull-right order-sort" data-id="id"></i></th>
        <th>Дата<i class="fa fa-arrows-v pull-right order-sort" data-id="order_add_time"></i></th>
        <th>Клиент<i class="fa fa-arrows-v pull-right order-sort" data-id="order_client_name"></i></th>
        <th>Телефон<i class="fa fa-arrows-v pull-right order-sort" data-id="order_client_phone"></i></th>
        <th>Товар<i class="fa fa-arrows-v pull-right order-sort" data-id="good"></i></th>
        <th>Статус<i class="fa fa-arrows-v pull-right order-sort" data-id="state"></i></th>
      </tr>
    </thead>
    <tbody>
		@foreach ($orderPaginate as $order)
			<tr>
				<td>{{ $order->order_id }}</td>
				<td>{{ date('Y-m-d', strtotime($order->order_add_time)) }}</td>
				<td>{{ $order->order_client_name }}</td>
				<td>{{ $order->order_client_phone }}</td>
				<td>{{ $order->good->good_name }}</td>
				<td>{{ $order->state->state_name }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<?php echo $orderPaginate->render(); ?>
