function test(){
    $.post('{{path('kz_kwiz_refresh')}}', {data1: 'mydata1', data2:'mydata2'},
        function(data){
            alert(data);

        }, "json");
}
test();