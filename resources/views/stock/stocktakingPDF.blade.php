<h2 style="text-align: center;">Popis {{ date('d-m-Y', strtotime($stocktaking->start)) }} </h2>

<h4 style="text-align: center;">{{ $user->firstName . ' ' . $user->lastName }}</h4>



<br><br><br>


<table style="min-width: 500px;margin-left: 100px;border-spacing: 0px;">
    <tr>
        <th style="border-bottom: 1px solid #AAAAAA;border-right: 1px solid #AAAAAA;font-weight:normal;">Ime pijace</th>
        <th style="border-bottom: 1px solid #AAAAAA;border-right: 1px solid #AAAAAA;font-weight:normal;">Stevilo kosov
        </th>
        <th style="border-bottom: 1px solid #AAAAAA;font-weight:normal;">Ostatek</th>
    </tr>
    @foreach ($stocktakingDrinks as $drink)
        <tr>
            <td style="text-align: center;border-bottom: 1px solid #AAAAAA;border-right: 1px solid #AAAAAA;">
                {{ $drink->drinkName }}</td>
            <td style="text-align: center;border-bottom: 1px solid #AAAAAA;border-right: 1px solid #AAAAAA;">
                {{ $drink->drinkQuantity }}</td>
            <td style="text-align: center;border-bottom: 1px solid #AAAAAA;">{{ $drink->drinkWeight }}</td>
        </tr>
    @endforeach
</table>
