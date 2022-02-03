@extends('layouts.individual')
@section('content')                 
                 <h3 class="slideTitle">İzləmə Siyahım</h3>
                    <div class="breadcrumb-wrap">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <ul class="list-unstyled">
                            <li>
                              <a href="assets/login/index.html">Əsas səhifə</a>
                            </li>
                            <li class="active">
                              <a href="ShippingSender.html">İzləmə Siyahım</a>
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
                            <tr id="120101">
                              <td> 13.11.2018 </td>
                              <td> demo </td>
                              <td align="center">Gönderi Bilgileri Kaydedildi</td>
                              <td align="center" class="border-wrap">
                                <div class="dot-border-first">
                                  <span class="title" id="pop" data-toggle="popover" data-content="ENGİN URANOĞLU" data-original-title="" title="">ENGİN URANOĞLU</span>
                                </div>
                                <div class="dot-border-last">
                                  <span class="title" id="pop" data-toggle="popover" data-content="DEMO ALICI" data-original-title="" title="">DEMO ALICI</span>
                                </div>
                              </td>
                              <td align="center" width="25%">Gönderiyi Şubeye Teslim Etmeniz Bekleniyor </td>
                              <td align="center" class="icons">
                                <a onclick="home.confirmRemoveTrackingList(120101)" title="Takip listesinden çıkarmak için tıklayınız.">
                                  <i class="cancel">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/cancel-red.svg" width="16">
                                  </i>
                                </a>
                              </td>
                              <td align="center" class="icons">
                                <a data-id="120101" onclick="home.confirmSetShipmentDeliveryEmail(120101, true)" title="Gönderi teslim edildiğinde e-posta bilgisi almak istiyorsanız tıklayınız.">
                                  <i class="refresh">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/e-mail-minus.svg" width="20">
                                  </i>
                                </a>
                              </td>
                              <td align="center" class="icons">
                                <i></i>
                              </td>
                              <td align="center" class="icons">
                                <a onclick="shipmentDetail.getShipmentDetail(120101)" title="Detay">
                                  <i class="detail">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/down-arrow-orange.svg" width="12">
                                  </i>
                                </a>
                              </td>
                            </tr>
                            <tr id="909376052773">
                              <td> 20.3.2019 </td>
                              <td> Gelen Gönderi </td>
                              <td align="center">Çıkış Biriminde.</td>
                              <td align="center" class="border-wrap">
                                <div class="dot-border-first">
                                  <span class="title" id="pop" data-toggle="popover" data-content="ŞE***** CA*** ER** ŞE******* SA**** Tİ**********" data-original-title="" title="">ŞE***** CA*** ER** ŞE******* SA**** Tİ**********</span>
                                </div>
                                <div class="dot-border-last">
                                  <span class="title" id="pop" data-toggle="popover" data-content="OĞ***** AL******" data-original-title="" title="">OĞ***** AL******</span>
                                </div>
                              </td>
                              <td align="center" width="25%"></td>
                              <td align="center" class="icons">
                                <a onclick="home.confirmRemoveTrackingList(909376052773)" title="Takip listesinden çıkarmak için tıklayınız.">
                                  <i class="cancel">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/cancel-red.svg" width="16">
                                  </i>
                                </a>
                              </td>
                              <td align="center" class="icons">
                                <a data-id="909376052773" onclick="home.confirmSetShipmentDeliveryEmail(909376052773, true)" title="Gönderi teslim edildiğinde e-posta bilgisi almak istiyorsanız tıklayınız.">
                                  <i class="refresh">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/e-mail-minus.svg" width="20">
                                  </i>
                                </a>
                              </td>
                              <td align="center" class="icons">
                                <a href="https://bireysel.yurticikargo.com/Shipment/Tracking?code=909376052773&amp;rq=4" title="Hareketler">
                                  <i class="refresh">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/kargo-tasima-32-x-32.png" width="20">
                                  </i>
                                </a>
                              </td>
                              <td align="center" class="icons">
                                <i></i>
                              </td>
                            </tr>
                            <tr id="106992483613">
                              <td> 1.2.2019 </td>
                              <td> Takip Gönderisi </td>
                              <td align="center">Teslim Edildi.</td>
                              <td align="center" class="border-wrap">
                                <div class="dot-border-first">
                                  <span class="title" id="pop" data-toggle="popover" data-content="Kİ******** YA******** VE İL****** AN**** Şİ*****" data-original-title="" title="">Kİ******** YA******** VE İL****** AN**** Şİ*****</span>
                                </div>
                                <div class="dot-border-last">
                                  <span class="title" id="pop" data-toggle="popover" data-content="EV EV" data-original-title="" title="">EV EV</span>
                                </div>
                              </td>
                              <td align="center" width="25%">Teslim Alan: ER** BE** ****************** </td>
                              <td align="center" class="icons">
                                <a onclick="home.confirmRemoveTrackingList(106992483613)" title="Takip listesinden çıkarmak için tıklayınız.">
                                  <i class="cancel">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/cancel-red.svg" width="16">
                                  </i>
                                </a>
                              </td>
                              <td align="center" class="icons">
                                <i></i>
                              </td>
                              <td align="center" class="icons">
                                <a href="https://bireysel.yurticikargo.com/Shipment/Tracking?code=106992483613&amp;rq=1" title="Hareketler">
                                  <i class="refresh">
                                    <img src="./Yurtiçi Kargo - Takip Listem_files/kargo-tasima-32-x-32.png" width="20">
                                  </i>
                                </a>
                              </td>
                              <td align="center" class="icons">
                                <i></i>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

 @endsection