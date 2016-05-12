<table class="table table-bordered" id="order-content-table">
  	<thead>
      <tr>
        <th>#<i class="fa fa-arrows-v pull-right sort order-sort" data-id="order_id"></i></th>
        <th>Дата<i class="fa fa-arrows-v pull-right sort order-sort" data-id="order_add_time"></i></th>
        <th>Клиент<i class="fa fa-arrows-v pull-right sort order-sort" data-id="order_client_name"></i></th>
        <th>Телефон<i class="fa fa-arrows-v pull-right sort order-sort" data-id="order_client_phone"></i></th>
        <th>Товар<i class="fa fa-arrows-v pull-right sort order-sort" data-id="order_good"></i></th>
        <th>Статус<i class="fa fa-arrows-v pull-right sort order-sort" data-id="order_state"></i></th>
      </tr>
    </thead>
    <tbody>
    	<?php $num = 1?>
		@foreach ($orderPaginate as $order)
			<tr>
				<td><?php echo $num++ ?></td>
				<td>{{ date('Y-m-d', strtotime($order->order_add_time)) }}</td>
				<td>{{ $order->order_client_name }}</td>
				<td>{{ $order->order_client_phone }}</td>
				<td>
					<p>{{ $order->good->good_name }}</p>
					<p>
						{{ $order->good->advert->user_first_name }}
						{{ $order->good->advert->user_last_name }}
						( {{ $order->good->advert->user_login }} )
					</p>
				</td>
				<td>{{ $order->state->state_name }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<?php echo $orderPaginate->render(); ?>
