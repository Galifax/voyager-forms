<div class="panel panel-bordered panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">{{ ucwords(str_replace('_', ' ', $input->type)) }} Input</h3>
        <div class="panel-actions">
            <a class="panel-collapse-icon voyager-angle-down" data-toggle="block-collapse"
               aria-hidden="true"></a>
        </div> <!-- /.panel-actions -->
    </div> <!-- /.panel-heading -->

    <div class="panel-body">
        <form role="form" action="{{ route('voyager.inputs.update', $input->id) }}"
              method="POST"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label">Input Label</label>
                        <input name="label" class="form-control" id="label" value="{{ $input->label }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="class">Input Class</label>
                        <input name="class" class="form-control" id="class"
                               value="{{ $input->class }}">
                    </div>
                </div>

                @if (in_array($input->type, ['checkbox', 'select', 'radio']))
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="options">Input Options (Separated with ',')</label>
                            <input name="options" class="form-control" id="options" value="{{ $input->options }}"
                                   required>
                        </div>
                    </div>
                @endif

                <div class="col-md-6 col-lg-5">
                    <div class="form-group">
                        <input
                            type="checkbox"
                            name="required"
                            id="required"
                            data-name="required"
                            class="toggleswitch"
                            value="1"
                            data-on="Yes" {{ $input->required ? 'checked="checked"' : '' }}
                            data-off="No"
                        />
                        <label for="required"> &nbsp;Input Required</label>
                    </div> <!-- /.form-group -->
                </div>
            </div>

            <input type="hidden" name="input_id" value="{{ $input->id }}"/>
            <button type="submit"
                    class="btn btn-success btn-sm">{{ __('Update This Input') }}</button>
        </form>

        <form method="POST" action="{{ route('voyager.inputs.destroy', $input->id) }}">
            {{ method_field("DELETE") }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <span class="btn-group-xs">
                <button
                    data-delete-input-btn
                    type="submit"
                    style="float:right; margin-top:22px"
                    class="btn btn-danger btn-xs delete"
                >{{ __('voyager.generic.delete') }} This Input</button>
            </span>
        </form>
    </div> <!-- /.panel-body -->
</div>
