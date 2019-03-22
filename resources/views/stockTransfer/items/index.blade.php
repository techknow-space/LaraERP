

    <div class="card">
        <div class="card-header">
            <b>Parts</b>
            <div class="float-right">
                Transfer from <b>{{$stockTransfer->fromLocation->location_code}}</b> to <b>{{$stockTransfer->toLocation->location_code}}</b>
            </div>
        </div>
        <div class="card-body">
            <div class="row align-content-center">
                <table id="stoItemsTable" class="table" data-stid="{{$stockTransfer->id}}">
                    <thead>
                    <tr>
                        <th>
                            SKU
                        </th>
                        <th>
                            Part
                        </th>
                        <th>
                            InHand <b>{{$stockTransfer->fromLocation->location_code}}</b>
                        </th>
                        <th>
                            InHand <b>{{$stockTransfer->toLocation->location_code}}</b>
                        </th>
                        <th>
                            Transfer Qty
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stockTransfer->Items->sortBy(function ($part,$key){
                    return strtolower($part['Part']['devices']['brand']['name'].' '.$part['Part']['devices']['model_name'].' '.$part['Part']['part_name']);
                })  as $item)
                        <tr id="{{$item->id}}">
                            <td>
                                {{$item->Part->sku}}
                            </td>
                            <td>
                                {{$item->Part->devices->brand->name}} {{$item->Part->devices->model_name}} {{$item->Part->part_name}}
                            </td>
                            <td>
                                {{$item->Part->Stocks->where('location_id',$stockTransfer->fromLocation->id)->first()->stock_qty}}
                            </td>
                            <td>
                                {{$item->Part->Stocks->where('location_id',$stockTransfer->toLocation->id)->first()->stock_qty}}
                            </td>
                            <td>
                                @if($is_editable)
                                    <input type="number" step="1" min="0" class="form-control stoItemEditableField" name="stoItemQty" id="stoItemQty-{{$item->id}}" data-value="{{$item->qty}}" value="{{$item->qty}}" readonly='readonly'>
                                @else
                                    {{$item->qty}}
                                @endif
                            </td>
                            <td>
                                @if($is_editable)
                                    <i class="fas fa-check-circle stoItemInlineFunctionButton d-none" id="stoItemSaveBtn-{{$item->id}}" data-action="save"></i>
                                    <i class="fas fa-trash-alt stoItemInlineFunctionButton" id="stoItemDeleteBtn-{{$item->id}}" data-action="delete"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div id="stItemsTablePartSearchAdd">
                <form class="form-inline row" id="stItemsTablePartSearchAddForm" action="/stocktransfer/item/add">

                    <div class="form-group col-md-6">
                        <select name="stItemsTablePartSelect" id="stItemsTablePartSelect" class="form-control" style="width: 100%" required>
                            <option value="">Please Search for a Part</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="sr-only" for="stItemsTablePartAddQty">Qty</label>
                        <input type="number" step="1" min="1" class="form-control" name="stItemsTablePartAddQty" id="stItemsTablePartAddQty" placeholder="Qty" required>
                    </div>

                    <input type="hidden" name="stoID" value="{{$stockTransfer->id}}">
                    @csrf
                    <button type="submit" class="btn btn-primary mb-2">Add</button>

                </form>
            </div>
        </div>
    </div>

