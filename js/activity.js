//按钮音效
$(function()
{
  //按钮音效
  $(".page").click(function()
  {
    var audio_effect=$("#effect")
    //alert(audio_effect)
    console.log(audio_effect)
    audio_effect[0].play()
  })

})
