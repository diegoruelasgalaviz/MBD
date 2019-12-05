class signsession
{
  x = 1;
  constructor()
  {

  }
  finish()
  {

  }
  next()
  {
    if(this.x==1){
      document.getElementById('sign').style.display='none';
      document.getElementById('sign2').style.display='block';
      document.getElementById('btn-previous').style.display='block';
      document.getElementById('btn-home').style.display='none';
      document.getElementById('btn-finish').style.display='none';
      this.x++;
    }else if(this.x == 2){
      document.getElementById('sign2').style.display='none';
      document.getElementById('sign3').style.display='block';
      document.getElementById('btn-next').style.display='none';
      document.getElementById('btn-finish').style.display='block';
      document.getElementById('btn-previous').style.display='block';
      document.getElementById('btn-home').style.display='none';
      this.x++;
    }else if(this.x==3){
      tihs.finish();
    }

  }
  previous()
  {
    if(this.x==3){
      console.log("s");
      document.getElementById('sign2').style.display='block';
      document.getElementById('sign3').style.display='none';
      document.getElementById('btn-next').style.display='block';
      document.getElementById('btn-finish').style.display='none';
      this.x--;
    }else if(this.x==2){
      document.getElementById('sign2').style.display='none';
      document.getElementById('sign').style.display='block';
      document.getElementById('btn-previous').style.display='none';
      document.getElementById('btn-home').style.display='block';
      this.x--;
    }else if(this.x == 1){

    }else{

    }
  }

}

class postclass {
  interest = false
  constructor() {

  }
  interesting(){
    this.interest = (this.interest)?false:true;
    if(this.interest){
      document.getElementById('interest-pointer').src = "icons8-idea-500.png";
      document.getElementById('interest-pointer').style.width = "30px";
    }else if(!this.interest){
      document.getElementById('interest-pointer').src = "icons8-idea-50.png";
      document.getElementById('interest-pointer').style.width = "33px";
      
    }



  }
}
