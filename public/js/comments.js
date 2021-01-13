console.log('shfhjdfhv');

var onTextareaInput = function(e){
    var textarea = e.currentTarget;
    textarea.style.height = ""; /* Reset the height*/
    textarea.style.height = textarea.scrollHeight + "px"
}

var doEdit =function(comment_id) {
    console.log(comment_id);
    var theText = document.getElementById('theText_'+comment_id); // paragrav na show
    var theEditor = document.getElementById('editComment_'+comment_id); // textarea posle klik na edit
    var editorArea = document.getElementById('editor_'+comment_id);// paragrav posle klik na edit
    var subject = theEditor.value;
    subject = subject.replace(/<br ?\/?>/ig,'&#13;&#10;');
    theEditor.innerHTML = subject;
  
    //hide editor, show text
    theText.style.display = 'none';
    editorArea.style.display = 'inline';
    theEditor.focus();
 }

 var cancelEdit = function(comment_id){

    var theText = document.getElementById('theText_'+comment_id); 
    var editorArea = document.getElementById('editor_'+comment_id);
    theText.style.display = 'inline';
    editorArea.style.display = 'none';    

 }

 var editTaskDesc=function(){
     var displayDesc = document.getElementById('taskDesc');
     var displayEdit = document.getElementById('taskDescEdit');
     var textarea = document.querySelector('#taskDescEdit textarea');
     displayDesc.style.display = 'none';
     displayEdit.style.display = 'block';
     textarea.focus();

 }

 var cancelEditText=function(){
    var displayDesc = document.getElementById('taskDesc');
    var displayEdit = document.getElementById('taskDescEdit');
    displayDesc.style.display = 'block';
    displayEdit.style.display = 'none';
 }

 var changeStatus=function(){
    
    var currentStatus = document.getElementById("currentStatus").value;
    console.log(currentStatus);
    document.getElementById("currentStatus").value=currentStatus;
    var confirmBtn = document.getElementById("confirmBtn");
    var cancelBtn = document.getElementById("cancelBtn");
    confirmBtn.style.display = 'inline-block';
    cancelBtn.style.display = 'inline-block';
 }

 var returnUsers=function(){
    var selectedTeam=document.querySelector('#selectTeam').value;
    console.log(selectedTeam);

   //  fetch(url)
   //  .then(response => response.json())
   //  .catch(err => console.log(err))

    fetch('/teams/users', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
          'teamId': selectedTeam      
         })
  }).then(
     response => response.json()
  ).then(
     res=>{
      document.querySelector('#teamUsers').innerHTML=res.map(user => `<option value="${user.id}">${user.email}</option>`)
     }
  )
 }