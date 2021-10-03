                            <!-- edit_modal_Grade -->

                            <div class="modal fade" id="edit{{ $Product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                تعديل المنتج
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form  route('Grades.update','test')-->
                                            <form action="{{ route('products.update', 'test') }}" method="post"
                                                autocomplete="off">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="" class="mr-sm-2">اسم المنتج
                                                            :</label>
                                                        <input id="" type="text" name="Product_name"
                                                            class="form-control"
                                                            value="{{ $Product->Product_name }}" required>

                                                            <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="{{ $Product->id  }}">

                            
                                                        {{-- <!-- value="{{ $Grade->id }}" --> --}}
                                                    </div>
                                                    <div class="col">
                                                        <label for="" class="mr-sm-2">اسم البنك
                                                            :</label>
                                                        <select name="bank_name" id="bank_name" class="form-control"
                                                            required>
                                                            @foreach ($banks as $bank)
                                                                <option>{{ $bank->bank_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">ملاحظات
                                                :</label>
                                            <textarea class="form-control" name="description"
                                                id="exampleFormControlTextarea1" rows="3">{{ $Product->description }}
                
                </textarea>
                                        </div>
                                        <br><br>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">اغلاق</button>
                                            <button type="submit" class="btn btn-primary">تعديل</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
