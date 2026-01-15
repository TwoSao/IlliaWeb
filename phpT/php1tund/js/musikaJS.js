
$(function(){
    // Скрываем все ошибки при загрузке
    $('.viga').hide();

    // Кнопка очистки формы
    $('#puhasta').click(function(){
        $('#muusikaVorm')[0].reset();
        $('.viga').hide();
    });

    // Валидация при отправке формы
    $('#muusikaVorm').submit(function(event){
        let valid = true;

        // 1. Checkbox
        if($('input[name="valik"]:checked').length === 0){
            $('#viga1').show();
            valid = false;
        } else { $('#viga1').hide(); }

        // 2. Textarea
        if($('#musik').val().trim() === ""){
            $('#viga2').show();
            valid = false;
        } else { $('#viga2').hide(); }

        // 3. Number (0–24)
        let tunnid = $('#musiktund').val();
        if(tunnid === "" || isNaN(tunnid) || tunnid < 0 || tunnid > 24){
            $('#viga3').show();
            valid = false;
        } else { $('#viga3').hide(); }

        // 4. Radio
        if($('input[name="raadio"]:checked').length === 0){
            $('#viga4').show();
            valid = false;
        } else { $('#viga4').hide(); }

        // 5. Text (только буквы)
        let tekst = $('#kysi5').val().trim();
        if(tekst === "" || !/^[a-zA-Z\s]+$/.test(tekst)){
            $('#viga5').show();
            valid = false;
        } else { $('#viga5').hide(); }

        // 6. Select
        if($('#muusikaliik').val() === ""){
            $('#viga6').show();
            valid = false;
        } else { $('#viga6').hide(); }

        // Если есть ошибки — отменяем отправку
        if(!valid){
            event.preventDefault();
        } else {
            alert("Vorm on edukalt saadetud!");
        }
    });
});