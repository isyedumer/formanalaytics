@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <section class="scroll_to">
    </section >
    
    <section style="padding-left: 20px">
        <div style="width: 100%">
            <div class="columns one">
                <a href="{{ URL::tokenRoute('home') }}">
                    <button class="secondary icon-arrow-left"></button>
                </a>
            </div>
            <div class="columns eleven">
                <h3><b>Form Settings</b></h3>
            </div>
        </div>
    </section>

  

{{-- {{dd($settings->toArray())}} --}}
    <section>
        <card  style="width: 100%;">
            <div class="messages">

            </div>
            <form>
                
                <h5 style="margin: 0;background: black;color: white;padding-left: 47px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 11px;">Logo Settings</h5>
                    <div class="row">
                        <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                            <label><b>Logo</b></label>
                        </div>
                        <div class="column six">
                            <input type="text" name="logo_link" value="{{$settings->logo_link ?? ''}}">
                            <em>Please paste the link to your image in the field. First, upload your image to the Shopify Content File section to get the link, then copy the link provided and paste it here. Please note that only links to images uploaded to Shopify will work here..</em>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                            <label><b>Logo Alignment</b></label>
                        </div>
                        <div class="column six">
                            <select name="logo_alignment" >
                                <option value="left" @isset($settings) @if($settings->logo_alignment == 'left') selected='selected' @endif @endisset>left</option>
                                <option value="right" @isset($settings) @if($settings->logo_alignment == 'right') selected='selected' @endif @endisset>right</option>
                                <option value="center" @isset($settings) @if($settings->logo_alignment == 'center') selected='selected' @endif @endisset>center</option>
                            </select>
                            <em>Select the Logo Alignment, Title will be align according to the selected value.</em>
                        </div>
                    </div>
                
                    <h5 style="margin: 0;background: black;color: white;padding-left: 47px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 11px;">Title Settings</h5>

            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Title text</b></label>
                </div>
                <div class="column six">
                    <input type="text" name="form_title" value="{{$settings->form_title ?? ""}}">
                    <em>Enter the Title text, Title will be shown above the Form.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Title text Size</b></label>
                </div>
                <div class="column six">
                    <select name="title_text_size" id="">
                        <option value="large"  @isset($settings) @if($settings->title_text_size == 'large') selected='selected' @endif @endisset>large</option>
                        <option value="larger"  @isset($settings) @if($settings->title_text_size == 'larger') selected='selected' @endif @endisset>larger</option>
                        <option value="x-large"  @isset($settings) @if($settings->title_text_size == 'x-large') selected='selected' @endif @endisset>x-large</option>
                        <option value="xx-large"  @isset($settings) @if($settings->title_text_size == 'xx-large') selected='selected' @endif @endisset>xx-large</option>
                        <option value="xxx-large"  @isset($settings) @if($settings->title_text_size == 'xxx-large') selected='selected' @endif @endisset>xxx-large</option>
                        <option value="medium"  @isset($settings) @if($settings->title_text_size == 'medium') selected='selected' @endif @endisset>medium</option>
                        <option value="small"  @isset($settings) @if($settings->title_text_size == 'small') selected='selected' @endif @endisset>small</option>
                        <option value="smaller"  @isset($settings) @if($settings->title_text_size == 'smaller') selected='selected' @endif @endisset>smaller</option>
                        <option value="x-small"  @isset($settings) @if($settings->title_text_size == 'x-small') selected='selected' @endif @endisset>x-small</option>
                        <option value="xx-small"  @isset($settings) @if($settings->title_text_size == 'xx-small') selected='selected' @endif @endisset>xx-small</option>
                    </select>
                    <em>Select the Title text size, Title will be shown above the Form.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Title text Alignment</b></label>
                </div>
                <div class="column six">
                    <select name="title_text_alignment" id="">
                        <option value="left" @isset($settings) @if($settings->title_text_alignment == 'left') selected='selected' @endif @endisset>left</option>
                        <option value="right" @isset($settings) @if($settings->title_text_alignment == 'right') selected='selected' @endif @endisset>right</option>
                        <option value="center" @isset($settings) @if($settings->title_text_alignment == 'center') selected='selected' @endif @endisset>center</option>
                    </select>
                    <em>Select the Title text Alignment, Title will be align according to the selected value.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Title text color</b></label>
                </div>
                <div class="column six">
                   <input type="color" name="title_text_color" value="{{$settings->title_text_color ?? ''}}">
                    <em>select the Title text color.</em>
                </div>
            </div>
            <h5 style="margin: 0;background: black;color: white;padding-left: 47px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 11px;">Description Settings</h5>

            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Description Text</b></label>
                </div>
                <div class="column six">
                    <textarea id="" cols="30" rows="3" name="form_desc">{{$settings->form_desc ?? ""}}</textarea>
                    <em>Enter the Description, Description will be shown below the Title.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Description Font Size</b></label>
                </div>
                <div class="column six">
                    <select name="desc_text_size" id="">
                        <option value="large"  @isset($settings) @if($settings->desc_text_size == 'large') selected='selected' @endif @endisset>large</option>
                        <option value="larger"  @isset($settings) @if($settings->desc_text_size == 'larger') selected='selected' @endif @endisset>larger</option>
                        <option value="x-large"  @isset($settings) @if($settings->desc_text_size == 'x-large') selected='selected' @endif @endisset>x-large</option>
                        <option value="xx-large"  @isset($settings) @if($settings->desc_text_size == 'xx-large') selected='selected' @endif @endisset>xx-large</option>
                        <option value="xxx-large"  @isset($settings) @if($settings->desc_text_size == 'xxx-large') selected='selected' @endif @endisset>xxx-large</option>
                        <option value="medium"  @isset($settings) @if($settings->desc_text_size == 'medium') selected='selected' @endif @endisset>medium</option>
                        <option value="small"  @isset($settings) @if($settings->desc_text_size == 'small') selected='selected' @endif @endisset>small</option>
                        <option value="smaller"  @isset($settings) @if($settings->desc_text_size == 'smaller') selected='selected' @endif @endisset>smaller</option>
                        <option value="x-small"  @isset($settings) @if($settings->desc_text_size == 'x-small') selected='selected' @endif @endisset>x-small</option>
                        <option value="xx-small"  @isset($settings) @if($settings->desc_text_size == 'xx-small') selected='selected' @endif @endisset>xx-small</option>
                    </select>
                    <em>Select the Description Font size, Title will be shown above the Form.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Description Text Alignment</b></label>
                </div>
                <div class="column six">
                    <select name="desc_text_alignment" id="">
                        <option value="left" @isset($settings) @if($settings->desc_text_alignment == 'left') selected='selected' @endif @endisset>left</option>
                        <option value="right" @isset($settings) @if($settings->desc_text_alignment == 'right') selected='selected' @endif @endisset>right</option>
                        <option value="center" @isset($settings) @if($settings->desc_text_alignment == 'center') selected='selected' @endif @endisset>center</option>
                        <option value="justify" @isset($settings) @if($settings->desc_text_alignment == 'justify') selected='selected' @endif @endisset>justify</option>

                    </select>
                    <em>Select the Description text Alignment, Title will be align according to the selected value.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Description text color</b></label>
                </div>
                <div class="column six">
                   <input type="color" name="desc_text_color" value="{{$settings->desc_text_color ?? ''}}">
                    <em>select the Description text color.</em>
                </div>
            </div>
            <h5 style="margin: 0;background: black;color: white;padding-left: 47px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 11px;">Body Settings</h5>

            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Body Background Color</b></label>
                </div>
                <div class="column six">
                    <input type="color" name="body_background_color" value="{{$settings->body_background_color ?? ""}}">
                    <em>Select the background color for body.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Body Background Opacity</b></label>
                </div>
                <div class="column six">
                    <input type="number" name="body_background_opacity" min="0" max="1" step="0.01" value="{{$settings->body_background_opacity ?? ""}}">
                    <em>Value must be between 0 and 1 e.g 1, 0, 0.1, 0.7 etc.</em>
                </div>
            </div>
            <h5 style="margin: 0;background: black;color: white;padding-left: 47px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 11px;">Form Settings</h5>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Form Background Type</b></label>
                </div>
                <div class="column six">
                    <select name="form_background_type">
                        <option value="color" @isset($settings) @if($settings->form_background_type == 'color') selected='selected' @endif @endisset>Color</option>
                        <option value="image"  @isset($settings) @if($settings->form_background_type == 'image') selected='selected' @endif @endisset>Image</option>
                    </select>
                    <em>Select the background type for Form Model.</em>
                </div>
            </div>
            <div class="color-row" @isset($settings) @if($settings->form_background_type == 'color') style="display:block" @else style="display:none" @endif @endisset>
                <div class="row">
                    <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                        <label><b>Form Background Color</b></label>
                    </div>
                    <div class="column six">
                        <input type="color" name="form_background_color" value="{{$settings->form_background_color ?? ""}}">
                        <em>Select the background color for Form Model.</em>

                    </div>
                </div>
            </div>
            <div class="image-row" @isset($settings) @if($settings->form_background_type == 'image') style="display:block"  @else style="display:none" @endif @else style="display:none;" @endisset>
                <div class="row">
                    <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                        <label><b>Form Background image</b></label>
                    </div>
                    <div class="column six">
                        <input type="text" name="form_background_image_link" value="{{$settings->form_background_image_link ?? ''}}">
                        <em>Please paste the link to your image in the field. First, upload your image to the Shopify Content File section to get the link, then copy the link provided and paste it here. Please note that only links to images uploaded to Shopify will work here..</em>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Form Background Opacity</b></label>
                </div>
                <div class="column six">
                    <input type="number" name="form_background_opacity" min="0" max="1" step="0.01" value="{{$settings->form_background_opacity ?? ""}}">
                    <em>Value must be between 0 and 1 e.g 1, 0, 0.1, 0.7 etc.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Form Fields Title Text Color</b></label>
                </div>
                <div class="column six">
                    <input type="color" name="form_fields_title_text_color" value="{{$settings->form_fields_title_text_color ?? ''}}">
                    <em>Select the text color for form field's tilte.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Form Fields border Color</b></label>
                </div>
                <div class="column six">
                    <input type="color" name="form_fields_border_color" value="{{$settings->form_fields_border_color ?? ''}}">
                    <em>Select the color for form field's tilte.</em>
                </div>
            </div>
            <h5 style="margin: 0;background: black;color: white;padding-left: 47px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 11px;">Button Settings</h5>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Button Background Color</b></label>
                </div>
                <div class="column six">
                    <input type="color" name="btn_background_color" value="{{$settings->btn_background_color ?? ""}}">
                    <em>Select the background color for the button that opens the form.</em>

                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Button Text</b></label>
                </div>
                <div class="column six">
                    <input type="text" name="btn_text" value="{{$settings->btn_text ?? ""}}">
                    <em>Enter the text for the button that opens the form.</em>

                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Button Text Color</b></label>
                </div>
                <div class="column six">
                    <input type="color" name="btn_text_color" value="{{$settings->btn_text_color ?? ''}}">
                    <em>Select the text color for the button that opens the form.</em>
                </div>
            </div>
            <div class="row">
                <div class="column three" style="text-align: left;padding-top: 7px; padding-left: 50px;">
                    <label><b>Button Alignment</b></label>
                </div>
                <div class="column six">
                    <select name="btn_alignment" id="">
                        <option value="left" @isset($settings) @if($settings->btn_alignment == 'left') selected='selected' @endif @endisset>left</option>
                        <option value="right" @isset($settings) @if($settings->btn_alignment == 'right') selected='selected' @endif @endisset>right</option>
                        <option value="center" @isset($settings) @if($settings->btn_alignment == 'center') selected='selected' @endif @endisset>center</option>
                    </select>
                    <em>Select the button  Alignment.</em>
                </div>
            </div>
            <div class="row">
                
                <div class="column eleven align-right">
                    <button type="submit">Save</button>
                </div>
            </div>
        </form>
        </card>
    </section>

@endsection

@section('scripts')
    @parent

    <script>
        $(document).ready(function(){
            $('select[name="form_background_type"]').on('change',function(){
                console.log('here');
                console.log($(this).val());
                if($(this).val() == 'image'){
                    $('.image-row').show();
                    $('.color-row').hide();
                }else{
                    $('.image-row').hide();
                    $('.color-row').show();
                }
            })
        })
        $('button[type="submit"]').on('click',function(e){
            e.preventDefault();
            // alert('clicked');
            let form = $(this).closest('form')[0];
            console.log(form)
            let formData = new FormData(form);
            console.log(formData);
            $.ajax({
          type: "post",
          url: `${window.location.origin}/save-form-settings`,
          data: formData,
          contentType: false,
          processData: false,
          success: function(feedback){
            console.log(feedback);
            if(feedback.status == 200){
            //   console.log('hereee');
            $('.messages').html('');
          $('html,body').animate({
              scrollTop: $(".scroll_to").offset().top},
              'slow');
              setTimeout(() => {
          $('.messages').html(`<div class="alert success">
              <dl>
              <dt>${feedback.message}</dt>
              </dl>
              </div>`);
              
              
              }, 800);
            //   setTimeout(() => {
            //     window.location.reload();  
            //   }, 1000);
            }

          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            $('.messages').html();
            $('html,body').animate({
              scrollTop: $(".scroll_to").offset().top},
              'slow');
            $('.messages').html(`<div class="alert error">
              <dl>
              <dt>${jqXHR.responseJSON.message}</dt>
              </dl>
              </div>`);
          }
         
        });
        })
    </script>
@endsection