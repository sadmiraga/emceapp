<table style="width: 70%;margin-right: 15%;margin-left: 15%;border: 1px solid #AAAAAA;border-spacing: 0px;">
    <tr>
        <th style="border-bottom: 1px solid #AAAAAA;border-right: 1px solid #AAAAAA;">Ime pijace</th>
        <th style="border-bottom: 1px solid #AAAAAA;border-right: 1px solid #AAAAAA;">Stevilo kosov</th>
        <th style="border-bottom: 1px solid #AAAAAA;">Ostatek</th>
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
