@extends('layouts.corporate')
@section('content')                 
                 <h3 class="slideTitle">İzləmə Siyahım</h3>
                    <div class="breadcrumb-wrap">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <ul class="list-unstyled">
                            <li>
                              <a href="#">Əsas səhifə</a>
                            </li>
                            <li class="active">
                              <a href="#">İzləmə Siyahım</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>

                <div class="shipping-sender">
                      <h6>İzləmə Siyahım</h6>
                      <div class="table-responsive">
                        <table class="table" id="table-tracking">
                          <thead>
                            <tr>
                              <th>İşlem Tarihi</th>
                              <th>Gönderi Adı</th>
                              <th align="center">Durum</th>
                              <th align="center"> Gönderici Adı <br> Alıcı Adı </th>
                              <th align="center">Açıklama</th>
                              <th colspan="4" align="center">İşlemler</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="909376052773">
                              <td> 20.3.2019 </td>
                              <td> Gelen Gönderi </td>
                              <td align="center">Çıkış Biriminde.</td>
                              <td align="center" class="border-wrap">
                                <div class="dot-border-first">
                                  <span class="title" id="pop" data-toggle="popover" data-content="Ali Shikhiyev" data-original-title="" title="">Ali Shikhiyev</span>
                                </div>
                                <div class="dot-border-last">
                                  <span class="title" id="pop" data-toggle="popover" data-content="Elesger Eldarov" data-original-title="" title="">Elesger Eldarov</span>
                                </div>
                              </td>
                              <td align="center" width="25%">fsdfdsfs</td>
                              <td align="center" class="">
                                <a onclick="home.confirmRemoveTrackingList(909376052773)" title="Takip listesinden çıkarmak için tıklayınız.">
                                  <i style="color:red" class="fas fa-window-close fa-1"></i>
                                </a>
                              </td>
                              <td align="center" class="">
                                <a data-id="909376052773" onclick="home.confirmSetShipmentDeliveryEmail(909376052773, true)" title="Gönderi teslim edildiğinde e-posta bilgisi almak istiyorsanız tıklayınız.">
                                  <i style="color:grey" class="fas fa-envelope fa-2x1"></i>
                                </a>
                              </td>
                              <td align="center" class="">
                                <a href="https://bireysel.yurticikargo.com/Shipment/Tracking?code=909376052773&amp;rq=4" title="Hareketler">
                                  <i style="color:orange" class="fas fa-truck fa-2x1"></i>
                                </a>
                              </td>
                              <td align="center" class="iconss">
                                <i style="color:green" class="fas fa-info-circle fa-2x1"></i>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

 @endsection