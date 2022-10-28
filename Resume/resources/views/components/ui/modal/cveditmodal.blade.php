<div class="modal fade modal-fullscreen p-0" data-backdrop="static" id="setingsmodal" tabindex="-1"
    aria-labelledby="userloginmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Resume Builder</p>

                    <button data-dismiss="modal" class="btn btn-default float-right userloginclosebtn">Close
                    </button>
                </div>
            </div>
            <div class="modal-body" id="seetimgmodalbody">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-header m-0">
                            {{-- <a for="exampleInputPassword1" data-toggle="collapse" href="#demo">Section
                                Select</a> --}}
                            <div id="demo" class="mt-2">
                                <div id="settingsdiv">
                                    @if ($settings[0]->image !="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Image</span>
                                        <input type="checkbox" name="image" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Image</span>
                                        <input type="checkbox" name="image" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->name !="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Name</span>
                                        <input type="checkbox" name="name" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Name</span>
                                        <input type="checkbox" name="name" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->title!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Title</span>
                                        <input type="checkbox" name="title" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Title</span>
                                        <input type="checkbox" name="title" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->about!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>About</span>
                                        <input type="checkbox" name="about" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>About</span>
                                        <input type="checkbox" name="about" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->address!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Address</span>
                                        <input type="checkbox" name="address" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Address</span>
                                        <input type="checkbox" name="address" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->profile!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Profile</span>
                                        <input type="checkbox" name="profile" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Profile</span>
                                        <input type="checkbox" name="profile" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->education!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Education</span>
                                        <input type="checkbox" name="education" class="acoountsettingcheckbox"
                                            checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Education</span>
                                        <input type="checkbox" name="education" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->experence!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Experence</span>
                                        <input type="checkbox" name="experence" class="acoountsettingcheckbox"
                                            checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Experence</span>
                                        <input type="checkbox" name="experence" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->skill!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Skill</span>
                                        <input type="checkbox" name="skill" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Skill</span>
                                        <input type="checkbox" name="skill" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->language!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Language</span>
                                        <input type="checkbox" name="language" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>Language</span>
                                        <input type="checkbox" name="language" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif @if ($settings[0]->tools!="")
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>tools</span>
                                        <input type="checkbox" name="tools" class="acoountsettingcheckbox" checked />
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary m-1 btn-sm">
                                        <span>tools</span>
                                        <input type="checkbox" name="tools" class="acoountsettingcheckbox" />
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapseprofileimage">Profile
                                Image</a>
                            <div id="colapseprofileimage" class="collapse">
                                <div class="custom-file mt-1">
                                    <label class="custom-file-label" for="progileimagechange"></label>
                                    {{--
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <!-- Laravel form csrf token -->
                                        @csrf --}}
                                        <div class="form-group">
                                            <input id="imagechoser" type="file" class="custom-file-input"
                                                accept="image/*" onchange="loadFile(event)" />
                                        </div>
                                        {{--
                                    </form>
                                    --}}
                                </div>
                            </div>
                        </div>
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapsenametitle">Name
                                &
                                Title</a>
                            <div id="colapsenametitle" class="collapse mt-1">
                                <form method="POST" action="/nametitle">
                                    @csrf
                                    <input type="hidden" name="cvid"
                                        value="{{ $userdata->userhasmanycvrelation[0]->id }}" />
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Name</span>
                                        </div>
                                        <input name="cvname" type="text" class="form-control" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Title</span>
                                        </div>
                                        <input name="cvtitle" type="text" class="form-control" />
                                    </div>
                                    <div class="input-group p-0">
                                        <button class="btn btn-success" type="submit" id="skillsubmitformbtn">
                                            Upadte
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapseabout">About
                                yourself</a>
                            <div id="colapseabout" class="collapse mt-1">
                                <form method="POST" action="/about">
                                    @csrf
                                    <input type="hidden" name="cvid"
                                        value="{{ $userdata->userhasmanycvrelation[0]->id }}" />
                                    <textarea name="aboutfield" class="aboutfield summernote"></textarea>
                                    <button id="upadetaboutbutton" type="submit"
                                        class="btn btn-success form-control mt-1">
                                        Add
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapseaddress">Address</a>
                            <div id="colapseaddress" class="collapse mt-1">
                                <form method="POST" action="/address">
                                    @csrf
                                    <input type="hidden" name="cvid"
                                        value="{{ $userdata->userhasmanycvrelation[0]->id }}" />
                                    <textarea name="addressfield" class="addressfield summernote"></textarea>
                                    <button id="upadetaddressbutton" type="submit"
                                        class="btn btn-success form-control mt-1">
                                        Add
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapseaccountadd">Accounts</a>
                            <div id="colapseaccountadd" class="collapse mt-1">
                                <form method="POST" action="/account">
                                    @csrf
                                    <input type="hidden" name="cvid"
                                        value="{{ $userdata->userhasmanycvrelation[0]->id }}" />
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text p-0">
                                                <select name="account" class="custom-select rounded-0"
                                                    id="exampleSelectRounded0">
                                                    <option value="facebook">Facebook</option>
                                                    <option value="github">Github</option>
                                                    <option value="linkedin">Linkedin</option>
                                                    <option value="codeforces">Codeforces</option>
                                                    <option value="hackerrank">Hackerrank</option>
                                                    <option value="instagram">Instagram</option>
                                                    <option value="twitter">Twitter</option>
                                                    <option value="stack-overflow">Stack-Overflow</option>
                                                </select>
                                            </span>
                                        </div>
                                        <input name="accounthandler" type="text" class="form-control"
                                            placeholder="Account handler" id="githubhandlerfield" />
                                        <div class="input-group-append">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text p-0">
                                                    <button type="submit" class="btn btn-success">Add</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapseeducation">Education</a>
                            <div id="colapseeducation" class="collapse mt-1">
                                <div class="form-group">
                                    <form method="POST" action="/education">
                                        @csrf
                                        <input type="hidden" name="cvid"
                                            value="{{ $userdata->userhasmanycvrelation[0]->id }}" />
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Institution</span>
                                            </div>
                                            <input name="institution" type="text" class="form-control" />
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Degree</span>
                                            </div>
                                            <input name="degree" type="text" class="form-control" />
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Duration year</span>
                                            </div>
                                            <input name="year" type="text" class="form-control"
                                                placeholder=" 1999-2025" />
                                        </div>
                                        <button type="submit" class="btn btn-success form-control mt-1">
                                            Add
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapseexperence">Experence</a>
                            <div id="colapseexperence" class="collapse mt-1">
                                <div class="form-group">
                                    <form method="POST" action="/experence">
                                        @csrf
                                        <input type="hidden" name="cvid"
                                            value="{{ $userdata->userhasmanycvrelation[0]->id }}" />
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Subject</span>
                                            </div>
                                            <input name="experencesubject" type="text" class="form-control" />
                                        </div>
                                        <textarea name="experencedetails" class="form-control" rows="3"
                                            placeholder="Describe your experence" spellcheck="false"></textarea>

                                        <button type="submit" class="btn btn-success form-control">
                                            Add
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapseskill">Skills</a>
                            <div id="colapseskill" class="collapse mt-1">
                                <div class="form-group">
                                    <form method="POST" action="{{ url('skilladd') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="hidden" name="cvid"
                                                value="{{ $userdata->userhasmanycvrelation[0]->id }}" />
                                            <input name="skillname" type="text" class="form-control"
                                                placeholder="Skillname" id="skill-one-name" />

                                            <input name="skillpercent" type="number" class="form-control"
                                                placeholder="80%" id="skill-one-percent" />

                                            <div class="input-group-append">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text p-0">
                                                        <button class="btn btn-success" type="submit"
                                                            id="skillsubmitformbtn">
                                                            Add
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="form-group card card-header m-0 w-100">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapselanguage">Language</a>
                            <div id="colapselanguage" class="collapse w-100">
                                <select class="form-control select2 select2-purple lang-select" name="language"
                                    multiple="multiple">
                                    <option></option>
                                    <option>cplus</option>
                                    <option>java</option>
                                    <option>js</option>
                                    <option>mongo</option>
                                    <option>mysql</option>
                                    <option>nodejs</option>
                                    <option>php</option>
                                    <option>python</option>
                                    <option>react</option>
                                    <option>bootstrap</option>
                                    <option>expressjs</option>
                                </select>
                                <button id="selectmanylanguage" class="btn btn-info mt-1">Add</button>
                            </div>
                        </div>
                        <div class="form-group card card-header m-0">
                            <a for="exampleInputPassword1" data-toggle="collapse" href="#colapsetools">Tools</a>
                            <div id="colapsetools" class="collapse">
                                <select class="form-control select2 select2-purple tools-select w-100"
                                    multiple="multiple">
                                    <option></option>
                                    <option>Android Studio</option>
                                    <option>Git</option>
                                    <option>Github Desktop</option>
                                    <option>Obs</option>
                                    <option>Postman</option>
                                    <option>Vscode</option>
                                </select>
                                <button id="selectmanytools" class="btn btn-info mt-1">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@once
    @push('styles')
      <link rel="stylesheet" href="{{ url('/Asset/css/components/makecv.css') }}">
    @endpush
@endonce

@once
    @push('scripts')
      <script src="{{ asset('/Asset/js/cv/settings.js') }}"></script>
    @endpush
@endonce