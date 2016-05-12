<table class="table table-bordered" id="good-content-table">
  	<thead>
      <tr>
      	<th></th>
        <th>#<i class="fa fa-arrows-v pull-right sort good-sort" data-id="good_id"></i></th>
        <th>Название<i class="fa fa-arrows-v pull-right sort good-sort" data-id="good_name"></i></th>
        <th>Цена<i class="fa fa-arrows-v pull-right sort good-sort" data-id="good_price"></i></th>
        <th>Рекламодатель<i class="fa fa-arrows-v pull-right sort good-sort" data-id="good_advert"></i></th>
      </tr>
    </thead>
    <tbody>
    	<?php $num = 1?>
		@foreach ($goodPaginate as $good)
			<tr>
				<td><input type="checkbox" name="good_choice" value=""></td>
				<td><?php echo $num++ ?></td>
				<td>
					<p><a href="/good/{{ $good->good_id }}/edit">{{ $good->good_name }}</a></p>
					<p>Внешний ID: {{ $good->good_id }}</p>
				</td>
				<td>{{ $good->good_price }}</td>
				<td>
					<p>
						{{ $good->advert->user_first_name }}
						{{ $good->advert->user_last_name }}
					</p>
					<p>
						( {{ $good->advert->user_login }} )
					</p>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<?php echo $goodPaginate->render(); ?>
