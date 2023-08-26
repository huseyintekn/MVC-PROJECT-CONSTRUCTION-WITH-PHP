<div class="modal fade modal-right" id="right_modal" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-3">
                <h4 class="modal-title">Kullanici Ekle</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body mt-1">
                <form id="form-data" method="POST" data-action="/user/save" enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="first_name">Ad</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="" name="first_name" value="" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="last_name">Soyad</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="" name="last_name" value="" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="identification_number">TC</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="identification_number" name="" value="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="email"></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" value="" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="address"></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <textarea class="form-control" id="address" name="address" autocomplete="off" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="status">Durum</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" id="status" name="status">
                                        <option selected value="">Seçiniz</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--    <div class="col-md-4 mt-3">
                                <div class="avatar-upload">
                                    <div class="validation-image mb-2" id="file-row">
                                        <label for="categoryImages_{{$language->language_code}}_file" class="font-weight-bold">@lang('admin/web/category/category.image')</label>
                                        <label for="categoryImages_{{$language->language_code}}_file" class="preview">
                                            <img id="upload_img_{{$language->language_code}}" src="{{isset($category->categoryImages) ? haveFile($category, "categoryImages", $language, "uploads/category") : asset('uploads/upload.jpeg')}}" alt="{{isset($category->categoryImages) ? imgAlt($category, "categoryImages", $language) : ""}}">
                                            <div class="avatar-edit">
                                                <input type="file" name="categoryImages[{{$language->language_code}}][file]" hidden id="categoryImages_{{$language->language_code}}_file" data-code="{{$language->language_code}}" onclick="previewUpload(this.id)">
                                                <label for="categoryImages_{{$language->language_code}}_file"></label>
                                            </div>
                                            <div class="avatar-delet" id="avatar_delete_{{$language->language_code}}">
                                                <label class="file-clear" id="file_clear_{{$language->language_code}}" data-code="{{$language->language_code}}" onclick="fileDelet(this.id)"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div id="image-list">
                                        <div class="validation-image mb-3">
                                            <label class="font-weight-bold" for="input-categoryImage{{$language->language_code}}_name">@lang('admin/web/category/category.image_name')</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="categoryImages_{{$language->language_code}}_name" name="categoryImages[{{$language->language_code}}][name]" value="{{(isset($category->categoryImages) && !empty($category->categoryImages)) ? ($category->categoryImages->where('language_code', $language->language_code)->first()->name ?? "") : ""}}" autocomplete="off" placeholder="@lang('admin/web/category/category.image_name')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="request-status">
                                        <label class="font-weight-bold" for="status">Durum</label>
                                        <div class="input-group">
                                            <select class="form-control" id="status" name="status">
                                                <option selected value="">Seçiniz</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr mb-2"></div>
                                    <div class="avatar-add">
                                        <button class="btn btn-outline-dark btn-square w-100 text-center justify-content-center"><i class="fa fa-plus"></i><span class="mr-2">@lang('general.button_add')</span></button>
                                    </div>
                                </div>
                            </div>-->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="data-submit" data-form="form-data"><i class="fa fa-save mr-1"></i><span class="line"></span>Kaydet</button>
                <button class="btn btn-outline-dark" data-dismiss="modal"><i class="fa fa-close mr-1"></i><span class="line"></span>Kapat</button>
            </div>
        </div>
    </div>
</div>

