cart.EffectiveCart = {
    // calculate total in shoppinc cart
    getSum: function() {
        var sum = 0;
        $$('.item').each(function(item) {
            item.id.match(/item(\d)/);
            var id = RegExp.$1;
            sum += $("price" + id).innerHTML * 
                $("select" + id).value;
        }.bind(this));
        return sum;
    }
}
