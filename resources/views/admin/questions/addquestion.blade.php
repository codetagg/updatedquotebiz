@extends('layouts.core.backend')

@section('title', 'Add Questions')

@section('head')
  <link rel="stylesheet" href="{{ asset('frontend-assets/assets/css/dashlite.css?ver=2.9.1') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('frontend-assets/assets/css/theme.css?ver=2.9.1') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('frontend-assets/assets/css/account.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('frontend-assets/assets/css/style.css') }}">
@endsection

@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Add Questions</h3>
                <div class="nk-block-des text-soft">
                    <p>Add service Questions</p>
                </div>
            </div><!-- .nk-block-head-content -->
           
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Create Questions</span>
                 <form action="{{ action('Admin\QuestionController@store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="row d-flex justify-content-center gy-4">
                   
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Select Category </label>
                            <div class="form-control-wrap">
                               <select class="form-control" onchange="category(this)">
                                <option value="" selected>Select Category</option>
                                   @foreach(Acelle\Jobs\HelperJob::categories() as $category)
                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                   @endforeach
                                     </select>
                            </div>
                        </div>
                    </div>
                       <div class="col-sm-7" id="appendbox">
                        
                    </div>
                  

                    <div class="col-sm-7 text-center">
                        <button class="btn btn-success btn-lg" type="submit">Save</button>
                    </div>

                   
                </div>
              </form>
            </div>
        </div>
    </div><!-- .card-preview -->

</div>
@endsection

@section('script')

<script type="text/javascript">
    function category(data){
        console.log(data.value);
        var html='<div class="startQuestion"><input type="hidden" id="addQuestionIndex0" name="addQuestionIndex0" value="0"><input type="hidden" name="category_id" value="'+data.value+'"><div class="appendQuestion"> <div class="row mb-4">'+
                '<div class="col-sm-3"><div class="custom-control custom-checkbox">'+
                '<input type="radio" name="check[0]" class="custom-control-input" id="customCheck0" value="single" checked>'+
                '<label class="custom-control-label" for="customCheck0">Single Selection</label>'+
                '</div></div>'+
                '<div class="col-sm-3"><div class="custom-control custom-checkbox">'+
                    '<input type="radio" name="check[0]" class="custom-control-input" id="customChecks0" value="multiple">'+
                    '<label class="custom-control-label" for="customChecks0">Multiple Selection</label>'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6"><span class="addQuestions material-icons-round add-icon xtooltip tooltipstered lh-1 float-end fs-3" style="cursor: pointer;">add_circle</span></div> </div>'+
                '<div class="row"><div class="col-sm-12 mb-4">'+
                        '<div class="form-group">'+
                            '<label class="form-label" for="default-01">Enter Question</label>'+
                            '<div class="form-control-wrap">'+
                                '<input type="text" class="form-control" name="question[]"  placeholder="Enter Question" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row appendChoice pr-0"><input type="hidden" value="0"><div class="col-sm-6 ">'+
                        '<div class="form-group">'+
                            '<label class="form-label" for="default-01">Enter Choice</label>'+
                            '<div class="form-control-wrap">'+
                                '<input type="text" class="form-control" name="choice[][]"  placeholder="Enter choice" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                    ' <div class="form-group">'+
                            '<label class="form-label" for="default-06">Icon</label>'+
                            '<div class="form-control-wrap">'+
                                '<div class="custom-file">'+
                                    '<input type="file" name="choice_icon[][]" class="custom-file-input" required>'+
                                    '<label class="custom-file-label" for="customFile">Choose file</label>'+
                                '</div>'+
                            '</div>'+
                       '</div>'+
                    '</div>'+
                    '<div class="col-sm-2 p-0"><span class="addChoice material-icons-round add-icon xtooltip tooltipstered  float-end fs-3" style="cursor: pointer;line-height:3!important">add_circle</span></div>'+
                    '</div>'+
                '</div></div></div>';

                $('#appendbox').html(html);
    }


    
     var x=0;
         var y=0;
         var z=0;
         var conID = 0;
         var conditionUp = 0;
   $(document).on('click','.addQuestions',function(e){
     var storageid=$(e.target).closest('.startQuestion').children()[0].value;
       var  maxField=6;
        conID = 0;
                // alert(childern);
            if(storageid < maxField){
                storageid++;
                y = storageid;
                conditionUp ++;
     
        console.log( $(e.target).closest('.row'));
        var html= '<div class="removeQuestion mt-5"><div class="row mb-4">'+
                '<div class="col-sm-3"><div class="custom-control custom-checkbox">'+
                '<input type="radio" name="check['+storageid+']" class="custom-control-input" id="customCheck'+conditionUp+'" value="single" checked>'+
                '<label class="custom-control-label" for="customCheck'+conditionUp+'">Single Selection</label>'+
                '</div></div>'+
                '<div class="col-sm-3"><div class="custom-control custom-checkbox">'+
                    '<input type="radio" name="check['+storageid+']" class="custom-control-input" id="customChecks'+conditionUp+'" value="multiple">'+
                    '<label class="custom-control-label" for="customChecks'+conditionUp+'">Multiple Selection</label>'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6"><span class="removeQuestions material-icons-round remove-icon xtooltip tooltipstered lh-1 float-end fs-3" style="cursor: pointer;">remove_circle</span></div> </div>'+
                '<div class="row"><div class="col-sm-12 mb-4">'+
                        '<div class="form-group">'+
                            '<label class="form-label" for="default-01">Enter Question'+conditionUp+'</label>'+
                            '<div class="form-control-wrap">'+
                                '<input type="text" class="form-control" name="question[]"  placeholder="Enter Question" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row appendChoice pr-0"><input type="hidden" value="'+conditionUp+'"><div class="col-sm-6">'+
                        '<div class="form-group">'+
                            '<label class="form-label" for="default-01">Enter Choice</label>'+
                            '<div class="form-control-wrap">'+
                                '<input type="text" class="form-control" name="choice['+y+'][]"  placeholder="Enter choice" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                    ' <div class="form-group">'+
                            '<label class="form-label" for="default-06">Icon</label>'+
                            '<div class="form-control-wrap">'+
                                '<div class="custom-file">'+
                                    '<input type="file" name="choice_icon['+y+'][]" class="custom-file-input" required>'+
                                    '<label class="custom-file-label" for="customFile">Choose file</label>'+
                                '</div>'+
                            '</div>'+
                       '</div>'+
                    '</div>'+
                    '<div class="col-sm-2 p-0"><span class="addChoice material-icons-round add-icon xtooltip tooltipstered  float-end fs-3" style="cursor: pointer;line-height:3!important">add_circle</span></div></div>'+
                  
                '</div></div>';
                $(e.target).closest('.appendQuestion').append(html);
                // console.log(index);
                 $(e.target).closest('.startQuestion').children()[0].value = storageid;
            }
    });

$(document).on('click','.removeQuestions',function(e){
    var storageid= $(e.target).closest('.startQuestion').children()[0].value;
         console.log(storageid);
        storageid--;
        $(e.target).closest('.startQuestion').children()[0].value = storageid;
 $(e.target).closest('.removeQuestion').last().remove();
 
});

$(document).on('click','.addChoice',function(e){
// yaha pay har click pay add karvaio ga usi div main
  var conditionid= $(e.target).closest('.appendChoice').children()[0].value;
         console.log(conditionid);
        var  maxField=6;
    
            if(conditionid < maxField ){

                
                conID = conditionid;
                conID++;

var html = '<div class="row removeChoices pr-0"><div class="col-sm-6">'+
                '<div class="form-group">'+
                    '<label class="form-label" for="default-01">Enter Choice</label>'+
                    '<div class="form-control-wrap">'+
                        '<input type="text" class="form-control" name="choice['+conditionid+'][]"  placeholder="Enter choice" required>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-sm-4">'+
            ' <div class="form-group">'+
                    '<label class="form-label" for="default-06">Icon</label>'+
                    '<div class="form-control-wrap">'+
                        '<div class="custom-file">'+
                            '<input type="file" name="choice_icon['+conditionid+'][]" class="custom-file-input" required>'+
                            '<label class="custom-file-label" for="customFile">Choose file</label>'+
                        '</div>'+
                    '</div>'+
               '</div>'+
            '</div>'+
            '<div class="col-sm-2 p-0"><span class="removeChoice material-icons-round remove-icon xtooltip tooltipstered  float-end fs-3" style="cursor: pointer;line-height:3!important">remove_circle</span></div></div>';

            $(e.target).closest('.appendChoice').after(html);
        }
    });

$(document).on('click','.removeChoice',function(e){
    
 $(e.target).closest('.removeChoices').remove();
 
});
</script>
@endsection