@php
Former::framework('App\Utils\Former\Framework\Metronic5');
@endphp

	<div class="m-portlet m-portlet--tab">
		<!--begin::Form-->
		@if (session('csrf_error')) {{ session('csrf_error') }} @endif

		@if(isset($user->id))
		    @php Former::populate($user); @endphp

		    {!! Former::horizontal_open()
		           ->class('m-form m-form--fit m-form--label-align-right')
		           ->method('PUT')
		           ->route('dashboard.updateProfile', [$user->id] + request()->query())
		    !!}
		    {{ method_field('PATCH') }}
		@else
		    {!! Former::horizontal_open()
		           ->class('m-form m-form--fit m-form--label-align-right')
		           ->method('POST')
		           ->route('dashboard.store')
		    !!}
		@endif
		{{ csrf_field() }}
		<div class="m-portlet__body">
                <div class="m-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            @lang('admin.Reset Profile')
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<label for="example-password-input" class="col-2 col-form-label">
										@lang('admin.Account Name')
									</label>
									<div class="col-3">
										<input class="form-control m-input pw" type="text" value="{{$user->name}}" id="newpw" placeholder="@lang('admin.Account Name')" name="name">
									</div>
								</div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<div class="row">
						<div class="col-10">
							<button type="submit" class="btn btn-outline-success">
								@lang('admin.Submit')
							</button>
							<a class="btn btn-secondary" href="{{ route('dashboard.show',Auth::user()->id) }}">
				                @lang('admin.Cancel')
				            </a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>