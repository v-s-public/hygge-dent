<?php
    $count = count($positions);
    $firstHalf = ceil($count / 2);
    $secondHalf = $count - $firstHalf;

    $firstHalfStartIndex = 0;
    $firstHalfStopIndex = $firstHalf - 1;

    $secondHalfStartIndex = $secondHalf;
    $secondHalfStopIndex = $count - 1;

?>

<div class="col-md-6">
    <table class="table">
        <tbody>
            @for($i = $firstHalfStartIndex; $i <= $firstHalfStopIndex; $i++)
                <tr>
                    <td class="price-position-name-cell">{{ $positions[$i]->price_position_name }}</td>
                    <td class="price-position-cost-cell">{{ $positions[$i]->price }} грн.</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
<div class="col-md-6">
    <table class="table">
        <tbody>
        @for($i = $secondHalfStartIndex; $i <= $secondHalfStopIndex; $i++)
            <tr>
                <td class="price-position-name-cell">{{ $positions[$i]->price_position_name }}</td>
                <td class="price-position-cost-cell">{{ $positions[$i]->price }} {{ __('frontend.price.currency') }}</td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>
