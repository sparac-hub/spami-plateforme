<?php $smtp_group = $current_group->keyBy('reference') ?>

<form action="{{ route('back.parameters.update-key-value-pairs') }}">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail Driver *</label>
                <input type="text" class="form-control" name="mail_driver"
                       value="{{ $smtp_group['mail_driver']['value'] }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail Host *</label>
                <input type="text" class="form-control" name="mail_host"
                       value="{{ $smtp_group['mail_host']['value'] }}"
                       required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail Port *</label>
                <input type="text" class="form-control" name="mail_port"
                       value="{{ $smtp_group['mail_port']['value'] }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail Encryption *</label>
                <input type="text" class="form-control" name="mail_encryption"
                       value="{{ $smtp_group['mail_encryption']['value'] }}" required>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail Username *</label>
                <input type="text" class="form-control" name="mail_username"
                       value="{{ $smtp_group['mail_username']['value'] }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail Password</label>
                <input type="password" class="form-control" name="mail_password"
                       @if(!$smtp_group['mail_password']['value']) disabled @endif
                >
                <input type="checkbox" name="smtpauth"
                       @if($smtp_group['mail_password']['value']) checked @endif
                > SMTPAuth required?
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail From Address *</label>
                <input type="text" class="form-control" name="mail_from_address"
                       value="{{ $smtp_group['mail_from_address']['value'] }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Mail From Name *</label>
                <input type="text" class="form-control" name="mail_from_name"
                       value="{{ $smtp_group['mail_from_name']['value'] }}" required>
            </div>
        </div>
    </div>


    <div class="form-actions">
        <a href="#" class="btn blue update-parameters">{{ __('og.button.save') }}</a>
        <button type="button" class="btn default">Cancel</button>
    </div>

</form>

@if(false)
    <hr>
    {{ pp($smtp_group->toArray()) }}
@endif
