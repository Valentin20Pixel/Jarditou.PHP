// Photo dynamique ajout de photo : Evenement change sur le input type file
if(document.getElementById('prevu'))
{
    document.getElementById('file').addEventListener('change', function (event){
        var input = document.getElementById('file');
        if(input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e){
                document.getElementById('prevu').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
}