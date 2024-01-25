<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Models\datasupp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          return view('addsupplier', [
            'title' => 'supplier',
            "supplier" => supplier::all()
        ]);
        // $cari = $request->query('cari');

        // if(!empty($cari)){
        //     $dataSupplier = ModeLmhs::sortable()
        //     ->where('supplier.supnama','nama', '%', $cari, '%')
        //     ->orwhere('supplier.suptelp','telp', '%', $cari, '%');
        // }else{
        //     $dataSupplier = Model
        // }

      
    }

    public function data($id)
    {
        // $supplier = Supplier::find($id);
        // return view('listsupplier', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addsupplier', [
            'supplier'=> supplier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'telp' => 'required|numeric',
            'alamat' => 'required',
            'kecpengiriman' => 'required|numeric',
            'tdiskon' => 'required|numeric',
            'pelayanan' => 'required|numeric',
            'garansi' => 'required|numeric',
            // 'keaslian' => 'required|numeric',
            'tpembayaran' => 'required|numeric'
        ]);
        
        supplier::create($validatedData);
        return redirect('/listsupplier')->with('sukses', 'Supplier Baru Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        // return view('supplier.show', [
        //     'supplier'=> $beritum
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = supplier::with('product')->find($id);

        return view('editsupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request  $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'telp' => 'required|numeric',
            'alamat' => 'required',
            'kecpengiriman' => 'required|numeric',
            'tdiskon' => 'required|numeric',
            'pelayanan' => 'required|numeric',
            'garansi' => 'required|numeric',
            // 'keaslian' => 'required|numeric',
            'tpembayaran' => 'required|numeric'
           
        ]);

        $supplier = Supplier::findOrFail($id);

        $supplier->update($validatedData);

        return redirect('/listsupplier')->with('sukses', 'Supplier Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    

    public function destroy ($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect('/listsupplier')->with('success','Data Terhapus');
    }

    public function rekomendasiSupplier(Request $request)
    {
        
        $hasilRekomendasi = [];
        
        $bobotKecepatanPengiriman = 0.25;
        $bobotTingkatDiskon = 0.15;
        $bobotPelayanan = 0.05;
        $bobotGaransi = 0.05;
        $bobotKeaslian = 0.20;
        $bobotTempoPembayaran = 0.10;

        $datasupp = [];

        foreach ($suppliers as $supplier) {
            $totalSkor = $bobotKecepatanPengiriman * $supplier->kecpengiriman +
            $bobotTingkatDiskon * $supplier->tdiskon +
            $bobotPelayanan * $supplier->pelayanan +
            $bobotGaransi * $supplier->garansi +
            $bobotKeaslian * $supplier->keaslian +
            $bobotTempoPembayaran * $supplier->tpembayaran;

            $hasilRekomendasi[$supplier->nama] = $totalSkor;
        
            $datasupp[$supplier->nama] = [
                'telp' => $supplier->telp,
                'alamat' => $supplier->alamat,
                'kecpengiriman' => $supplier->kecpengiriman,
                'tdiskon' => $supplier->tdiskon,
                'pelayanan' => $supplier->pelayanan,
                'garansi' => $supplier->garansi,
                'keaslian' => $supplier->keaslian,
                'tpembayaran' => $supplier->tpembayaran,
            ];
        }

        arsort($hasilRekomendasi);
        session(['hasilRekomendasi' => $hasilRekomendasi]);
        return view('datasupp', ['hasilRekomendasi'=>$hasilRekomendasi, 'datasupp' => $datasupp, 'suppliers' => $suppliers]);
    }

    public function cetakbestsupp(Request $request)
    {
        $suppliers = supplier::all();
        $datasupp = [];

        $recommendationAlgoritma = $this->algoritma();
        $recommendation = [];
        $suppliers = datasupp::all();
        // dd($recommendationAlgoritma);

        $suppplierEntropi1 = $suppliers->where(strtolower($recommendationAlgoritma[0]["type"]),$recommendationAlgoritma[0]["value"]);
        foreach($suppplierEntropi1 as $supp){
            array_push($recommendation,$supp);
        }

        $suppplierEntropi2 = $suppliers->where(strtolower($recommendationAlgoritma[0]["type"]),$recommendationAlgoritma[1]["defValue"])->where(strtolower($recommendationAlgoritma[1]["type"]),$recommendationAlgoritma[1]["value"]);
        foreach($suppplierEntropi2 as $supp1){
            array_push($recommendation,$supp1);
        }
        

        $suppplierEntropi3 = $suppliers->where(strtolower($recommendationAlgoritma[0]["type"]),$recommendationAlgoritma[2]["defValue"])->where(strtolower($recommendationAlgoritma[2]["type"]),$recommendationAlgoritma[2]["value"]);
        foreach($suppplierEntropi3 as $supp2){
            array_push($recommendation,$supp2);
        }
        
        return view('cetakbestsupp', ['hasilRekomendasi'=>$recommendation, 'datasupp' => $datasupp, 'suppliers' => $suppliers]);
    }

    public function rekomendasiSupplierAlgoritma(Request $request)
    {
        $suppliers = supplier::all();
        $datasupp = [];

        $recommendationAlgoritma = $this->algoritma();
        $recommendation = [];
        $suppliers = datasupp::all();
        // dd($recommendationAlgoritma);

        $suppplierEntropi1 = $suppliers->where(strtolower($recommendationAlgoritma[0]["type"]),$recommendationAlgoritma[0]["value"]);
        foreach($suppplierEntropi1 as $supp){
            array_push($recommendation,$supp);
        }

        $suppplierEntropi2 = $suppliers->where(strtolower($recommendationAlgoritma[0]["type"]),$recommendationAlgoritma[1]["defValue"])->where(strtolower($recommendationAlgoritma[1]["type"]),$recommendationAlgoritma[1]["value"]);
        foreach($suppplierEntropi2 as $supp1){
            array_push($recommendation,$supp1);
        }
        

        $suppplierEntropi3 = $suppliers->where(strtolower($recommendationAlgoritma[0]["type"]),$recommendationAlgoritma[2]["defValue"])->where(strtolower($recommendationAlgoritma[2]["type"]),$recommendationAlgoritma[2]["value"]);
        foreach($suppplierEntropi3 as $supp2){
            array_push($recommendation,$supp2);
        }

        $cari = $request->input('cari');
        if ($cari) {
            $filteredRecommendation = collect($recommendation)->filter(function ($supp) use ($cari) {
                return stripos($supp->namasupp, $cari) !== false;
            });

            $recommendation = $filteredRecommendation->all();
        
        }
        
        return view('datasupp', ['hasilRekomendasi'=>$recommendation, 'datasupp' => $datasupp, 'suppliers' => $suppliers]);
    }

    public static function entropi($pilih, $gakPilih, $total)
    {
        // dd($pilih . " " . $gakPilih. " ". $total);
        if($pilih == 0){
            $pilih =1;
        }
        if($gakPilih == 0){
            $gakPilih =1;
        }
        if($total == 0){
            $total =1;
        }
        $entropiClass = (-$pilih / $total * (log($pilih / $total,2))) + (-$gakPilih / $total * (log($gakPilih / $total,2)));
        
        if(is_nan($entropiClass)){
            $entropiClass = 0;
        }
        
        return($entropiClass);
    }

    public static function algoritma()
    {
        $arrayResult = [];
        $supplier = datasupp::all();
        $totalData = count($supplier);
        $pilih = count($supplier->where('Class',1));
        $gakPilih = count($supplier->where('Class',0));
        $entropiClass = SupplierController::entropi($pilih, $gakPilih, $totalData);

        // lokasi
        $totalDalamKota = count($supplier->where('lokasi','1'));
        $pilihDalamKota = count($supplier->where('lokasi','1')->where('Class',1));
        $gakPilihDalamKota = count($supplier->where('lokasi','1')->where('Class',0));
        $entropiDalamKota = SupplierController::entropi($pilihDalamKota, $gakPilihDalamKota, $totalDalamKota);
        
        $totalLuarKota = count($supplier->where('lokasi','0.5'));
        $pilihLuarKota = count($supplier->where('lokasi','0.5')->where('Class',1));
        $gakPilihLuarKota = count($supplier->where('lokasi','0.5')->where('Class',0));
        
        $entropiLuarKota = SupplierController::entropi($pilihLuarKota, $gakPilihLuarKota, $totalLuarKota);
        //dd($entropiLuarKota);
        $totalLuarPulau = count($supplier->where('lokasi','0'));
        $pilihLuarPulau = count($supplier->where('lokasi','0')->where('Class',1));
        $gakPilihLuarPulau = count($supplier->where('lokasi','0')->where('Class',0));
        $entropiLuarPulau = SupplierController::entropi($pilihLuarPulau, $gakPilihLuarPulau, $totalLuarPulau);
        
        $arrayLokasi = [[
            "entropi"=>$entropiDalamKota,
            "entropiType"=>"Dalam Kota",
            "entropiValue" => "1"
        ]
        ,[
            "entropi"=>$entropiLuarKota,
            "entropiType"=>"Luar Kota",
            "entropiValue" => "0.5"
        ],[
            "entropi"=>$entropiLuarPulau,
            "entropiType"=>"Luar Pulau",
            "entropiValue" => "0"
        ]];
        

        // pengiriman

        $totalLama = count($supplier->where('pengiriman','1'));
        $pilihLama = count($supplier->where('pengiriman','1')->where('Class',1));
        $gakPilihLama = count($supplier->where('pengiriman','1')->where('Class',0));
        $entropiLama = SupplierController::entropi($pilihLama, $gakPilihLama, $totalLama);

        $totalCepat = count($supplier->where('pengiriman','0.5'));
        $pilihCepat = count($supplier->where('pengiriman','0.5')->where('Class',1));
        $gakPilihCepat = count($supplier->where('pengiriman','0.5')->where('Class',0));
        $entropiCepat = SupplierController::entropi($pilihCepat, $gakPilihCepat, $totalCepat);

        $totalSedang = count($supplier->where('pengiriman','0'));
        $pilihSedang = count($supplier->where('pengiriman','0')->where('Class',1));
        $gakPilihSedang = count($supplier->where('pengiriman','0')->where('Class',0));
        $entropiSedang = SupplierController::entropi($pilihSedang, $gakPilihSedang, $totalSedang);

        $arrayPengiriman = [[
            "entropi"=>$entropiLama,
            "entropiType"=>"Lama",
            "entropiValue" => "1"
        ]
        ,[
            "entropi"=>$entropiCepat,
            "entropiType"=>"Cepat",
            "entropiValue" => "0"
        ],[
            "entropi"=>$entropiSedang,
            "entropiType"=>"Sedang",
            "entropiValue" => "0.5"
        ]];

        // diskon

        $totalTinggi = count($supplier->where('diskon','1'));
        $pilihTinggi = count($supplier->where('diskon','1')->where('Class',1));
        $gakPilihTinggi = count($supplier->where('diskon','1')->where('Class',0));
        $entropiTinggi = SupplierController::entropi($pilihTinggi, $gakPilihTinggi, $totalTinggi);

        $totalRendah = count($supplier->where('diskon','0.5'));
        $pilihRendah = count($supplier->where('diskon','0.5')->where('Class',1));
        $gakPilihRendah = count($supplier->where('diskon','0.5')->where('Class',0));
        $entropiRendah = SupplierController::entropi($pilihRendah, $gakPilihRendah, $totalRendah);

        $arrayDiskon = [[
            "entropi"=>$entropiTinggi,
            "entropiType"=>"Tinggi",
            "entropiValue" => "1"
        ]
        ,[
            "entropi"=>$entropiRendah,
            "entropiType"=>"Rendah",
            "entropiValue" => "0.5"
        ]];

        // garansi

        $totalAda = count($supplier->where('garansi','1'));
        $pilihAda = count($supplier->where('garansi','1')->where('Class',1));
        $gakPilihAda = count($supplier->where('garansi','1')->where('Class',0));
        $entropiAda = SupplierController::entropi($pilihAda, $gakPilihAda, $totalAda);

        $totalTidak = count($supplier->where('garansi','0.5'));
        $pilihTidak = count($supplier->where('garansi','0.5')->where('Class',1));
        $gakPilihTidak = count($supplier->where('garansi','0.5')->where('Class',0));
        $entropiTidak = SupplierController::entropi($pilihTidak, $gakPilihTidak, $totalTidak);

        $arrayGaransi = [[
            "entropi"=>$entropiTinggi,
            "entropiType"=>"Ada",
            "entropiValue" => "1"
        ]
        ,[
            "entropi"=>$entropiRendah,
            "entropiType"=>"Tidak",
            "entropiValue" => "0.5"
        ]];
       

        $gainLokasi = $entropiClass - (($totalLuarPulau/$totalData * $entropiLuarPulau) + ($totalLuarKota/$totalData * $entropiLuarKota) +($totalDalamKota/$totalData * $entropiDalamKota));
        
        // dd($entropiClass." - ((".$totalDalamKota."/".$totalData." * ".$entropiDalamKota.") + (".$totalLuarKota."/".$totalData." * ".$entropiLuarKota.") +(".$totalLuarPulau."/".$totalData." * ".$entropiLuarPulau."))");
        $gainPengiriman = $entropiClass - (($totalLama/$totalData * $entropiLama) + ($totalSedang/$totalData * $entropiSedang) +($totalCepat/$totalData * $entropiCepat));
        $gainDiskon = $entropiClass - (($totalTinggi/$totalData * $entropiTinggi) + ($totalRendah/$totalData * $entropiRendah));
        $gainGaransi = $entropiClass - (($totalAda/$totalData * $entropiAda) + ($totalTidak/$totalData * $entropiTidak) );  
        $array = [[
            "gain"=>$gainLokasi,
            "gainType"=>"Lokasi"
        ]
        ,[
            "gain"=>$gainPengiriman,
            "gainType"=>"Pengiriman"
        ],[
            "gain"=>$gainDiskon,
            "gainType"=>"Diskon"
        ],[
            "gain"=>$gainGaransi,
            "gainType"=>"Garansi"
        ]];
        $max = max(array_column($array, 'gain'));
        // dd($max);
        $maxGain = "";
        foreach($array as $arr){
            if($arr["gain"] == $max){
                $maxGain = $arr["gainType"];
            }
        }
        $chosenEntropi1 = "";
        if($maxGain == "Lokasi"){
            $min = min(array_column($arrayLokasi, 'entropi'));
            foreach($arrayLokasi as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi1 = $arr["entropiValue"];
                }
            }
        }else if($maxGain == "Pengiriman"){
            $min = min(array_column($arrayPengiriman, 'entropi'));
            foreach($arrayPengiriman as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi1 = $arr["entropiValue"];
                }
            }
        }else if($maxGain == "Diskon"){
            $min = min(array_column($arrayDiskon, 'entropi'));
            foreach($arrayDiskon as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi1 = $arr["entropiValue"];
                }
            }
        }else if($maxGain == "Garansi"){
            $min = min(array_column($arrayGaransi, 'entropi'));
            foreach($arrayGaransi as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi1 = $arr["entropiValue"];
                }
            }
        }

        $arrayEntropi1 = [
            "type" => $maxGain,
            "value" => $chosenEntropi1,
            "defValue" => $chosenEntropi1
        ];

        array_push($arrayResult,$arrayEntropi1);

        // dd($array);
        //dd(1);

        // Node 1.1

        $pilihDalamKotaPengirimanLama = count($supplier->where('lokasi','1')->where('pengiriman','0')->where('Class',1));
        $gakPilihDalamKotaPengirimanLama = count($supplier->where('lokasi','1')->where('pengiriman','0')->where('Class',0));
        $totalDalamKotaPengirimanLama = count($supplier->where('lokasi','1')->where('pengiriman','0'));
        $entropiDalamKotaPengirimanLama = SupplierController::entropi($pilihDalamKotaPengirimanLama, $gakPilihDalamKotaPengirimanLama, $totalDalamKotaPengirimanLama);

        $pilihDalamKotaPengirimanSedang = count($supplier->where('lokasi','1')->where('pengiriman','0.5')->where('Class',1));
        $gakPilihDalamKotaPengirimanSedang = count($supplier->where('lokasi','1')->where('pengiriman','0.5')->where('Class',0));
        $totalDalamKotaPengirimanSedang = count($supplier->where('lokasi','1')->where('pengiriman','0.5'));
        $entropiDalamKotaPengirimanSedang = SupplierController::entropi($pilihDalamKotaPengirimanSedang, $gakPilihDalamKotaPengirimanSedang, $totalDalamKotaPengirimanSedang);

        $pilihDalamKotaPengirimanCepat = count($supplier->where('lokasi','1')->where('pengiriman','1')->where('Class',1));
        $gakPilihDalamKotaPengirimanCepat = count($supplier->where('lokasi','1')->where('pengiriman','1')->where('Class',0));
        $totalDalamKotaPengirimanCepat = count($supplier->where('lokasi','1')->where('pengiriman','1'));
        $entropiDalamKotaPengirimanCepat = SupplierController::entropi($pilihDalamKotaPengirimanCepat, $gakPilihDalamKotaPengirimanCepat, $totalDalamKotaPengirimanCepat);

        $arrayPengiriman1 = [[
            "entropi"=>$entropiDalamKotaPengirimanLama,
            "entropiType"=>"Lama",
            "entropiValue" => "0"
        ]
        ,[
            "entropi"=>$entropiDalamKotaPengirimanCepat,
            "entropiType"=>"Cepat",
            "entropiValue" => "1"
        ],[
            "entropi"=>$entropiDalamKotaPengirimanSedang,
            "entropiType"=>"Sedang",
            "entropiValue" => "0.5"
        ]];

        $pilihDalamKotaDiskonTinggi = count($supplier->where('lokasi','1')->where('diskon','1')->where('Class',1));
        $gakPilihDalamKotaDiskonTinggi = count($supplier->where('lokasi','1')->where('diskon','1')->where('Class',0));
        $totalDalamKotaDiskonTinggi = count($supplier->where('lokasi','1')->where('diskon','1'));
        $entropiDalamKotaDiskonTinggi = SupplierController::entropi($pilihDalamKotaDiskonTinggi, $gakPilihDalamKotaDiskonTinggi, $totalDalamKotaDiskonTinggi);

        $pilihDalamKotaDiskonRendah = count($supplier->where('lokasi','1')->where('diskon','0.5')->where('Class',1));
        $gakPilihDalamKotaDiskonRendah = count($supplier->where('lokasi','1')->where('diskon','0.5')->where('Class',0));
        $totalDalamKotaDiskonRendah = count($supplier->where('lokasi','1')->where('diskon','0.5'));
        $entropiDalamKotaDiskonRendah = SupplierController::entropi($pilihDalamKotaDiskonRendah, $gakPilihDalamKotaDiskonRendah, $totalDalamKotaDiskonRendah);

        $arrayDiskon1 = [[
            "entropi"=>$entropiDalamKotaDiskonTinggi,
            "entropiType"=>"Tinggi",
            "entropiValue" => "1"
        ]
        ,[
            "entropi"=>$entropiDalamKotaDiskonRendah,
            "entropiType"=>"Rendah",
            "entropiValue" => "0.5"
        ]];

        $pilihDalamKotaGaransiAda = count($supplier->where('lokasi','1')->where('garansi','1')->where('Class',1));
        $gakPilihDalamKotaGaransiAda = count($supplier->where('lokasi','1')->where('garansi','1')->where('Class',0));
        $totalDalamKotaGaransiAda = count($supplier->where('lokasi','1')->where('garansi','1'));
        $entropiDalamKotaGaransiAda = SupplierController::entropi($pilihDalamKotaGaransiAda, $gakPilihDalamKotaGaransiAda, $totalDalamKotaGaransiAda);

        $pilihDalamKotaGaransiTidak = count($supplier->where('lokasi','1')->where('garansi','0.5')->where('Class',1));
        $gakPilihDalamKotaGaransiTidak = count($supplier->where('lokasi','1')->where('garansi','0.5')->where('Class',0));
        $totalDalamKotaGaransiTidak = count($supplier->where('lokasi','1')->where('garansi','0.5'));
        $entropiDalamKotaGaransiTidak = SupplierController::entropi($pilihDalamKotaGaransiTidak, $gakPilihDalamKotaGaransiTidak, $totalDalamKotaGaransiTidak);

        $arrayGaransi1 = [
        [
            "entropi"=>$entropiDalamKotaGaransiTidak,
            "entropiType"=>"Tidak",
            "entropiValue" => "0.5"
        ],[
            "entropi"=>$entropiDalamKotaGaransiAda,
            "entropiType"=>"Ada",
            "entropiValue" =>"1"
        ]];

        $gainDalamKotaPengiriman = $entropiDalamKota - (($totalDalamKotaPengirimanLama/$totalDalamKota * $entropiDalamKotaPengirimanLama) + ($totalDalamKotaPengirimanSedang/$totalDalamKota * $entropiDalamKotaPengirimanSedang) +($totalDalamKotaPengirimanCepat/$totalDalamKota * $entropiDalamKotaPengirimanCepat));

        $gainDalamKotaDiskon = $entropiDalamKota - (($totalDalamKotaDiskonTinggi/$totalDalamKota * $entropiDalamKotaDiskonTinggi) + ($totalDalamKotaDiskonRendah/$totalDalamKota * $entropiDalamKotaDiskonRendah));

        $gainDalamKotaGaransi = $entropiDalamKota - (($totalDalamKotaGaransiAda/$totalDalamKota * $entropiDalamKotaGaransiAda) + ($totalDalamKotaGaransiTidak/$totalDalamKota * $entropiDalamKotaGaransiTidak) );


        $array1 = [[
            "gain"=>$gainDalamKotaPengiriman,
            "gainType"=>"Pengiriman"
        ]
        ,[
            "gain"=>$gainDalamKotaDiskon,
            "gainType"=>"Diskon"
        ],[
            "gain"=>$gainDalamKotaGaransi,
            "gainType"=>"Garansi"
        ]];
        $max1 = max(array_column($array1, 'gain'));
        // dd($max1);
        $maxG = "";
        foreach($array1 as $arr){
            if($arr["gain"] == $max1){
                $maxG = $arr["gainType"];
            }
        }
        // dd($maxG);
        // uda dapat diskon

        $chosenEntropi2 = "";
        if($maxG == "Pengiriman"){
            $min = min(array_column($arrayPengiriman1, 'entropi'));
            foreach($arrayPengiriman1 as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi2 = $arr["entropiValue"];
                }
            }
        }else if($maxG == "Diskon"){
            $min = min(array_column($arrayDiskon1, 'entropi'));
            foreach($arrayDiskon1 as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi2 = $arr["entropiValue"];
                }
            }
        }else if($maxG == "Garansi"){
            $min = min(array_column($arrayGaransi1, 'entropi'));
            foreach($arrayGaransi1 as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi2 = $arr["entropiValue"];
                }
            }
        }

        $arrayEntropi2 = [
            "type" => $maxG,
            "value" => $chosenEntropi2,
            "defValue" => "1"
        ];

        array_push($arrayResult,$arrayEntropi2);

       
        $pilihLuarPulauDiskonTinggi = count($supplier->where('lokasi','0')->where('diskon','1')->where('Class',1));
        $gakPilihLuarPulauDiskonTinggi = count($supplier->where('lokasi','0')->where('diskon','1')->where('Class',0));
        $totalLuarPulauDiskonTinggi = count($supplier->where('lokasi','0')->where('diskon','1'));
        $entropiLuarPulauDiskonTinggi = SupplierController::entropi($pilihLuarPulauDiskonTinggi, $gakPilihLuarPulauDiskonTinggi, $totalLuarPulauDiskonTinggi);

        $pilihLuarPulauDiskonRendah = count($supplier->where('lokasi','0')->where('diskon','0.5')->where('Class',1));
        $gakPilihLuarPulauDiskonRendah = count($supplier->where('lokasi','0')->where('diskon','0.5')->where('Class',0));
        $totalLuarPulauDiskonRendah = count($supplier->where('lokasi','0')->where('diskon','0.5'));
        $entropiLuarPulauDiskonRendah = SupplierController::entropi($pilihLuarPulauDiskonRendah, $gakPilihLuarPulauDiskonRendah, $totalLuarPulauDiskonRendah);

        $arrayDiskon2 = [[
            "entropi"=>$entropiLuarPulauDiskonTinggi,
            "entropiType"=>"Tinggi",
            "entropiValue" => "1"
        ]
        ,[
            "entropi"=>$entropiLuarPulauDiskonRendah,
            "entropiType"=>"Rendah",
            "entropiValue" => "0.5"
        ]];

        $pilihLuarPulauGaransiAda = count($supplier->where('lokasi','0')->where('garansi','1')->where('Class',1));
        $gakPilihLuarPulauGaransiAda = count($supplier->where('lokasi','0')->where('garansi','1')->where('Class',0));
        $totalLuarPulauGaransiAda = count($supplier->where('lokasi','0')->where('garansi','1'));
        $entropiLuarPulauGaransiAda = SupplierController::entropi($pilihLuarPulauGaransiAda, $gakPilihLuarPulauGaransiAda, $totalLuarPulauGaransiAda);

        $pilihLuarPulauGaransiTidak = count($supplier->where('lokasi','0')->where('garansi','0.5')->where('Class',1));
        $gakPilihLuarPulauGaransiTidak = count($supplier->where('lokasi','0')->where('garansi','0.5')->where('Class',0));
        $totalLuarPulauGaransiTidak = count($supplier->where('lokasi','0')->where('garansi','0.5'));
        $entropiLuarPulauGaransiTidak = SupplierController::entropi($pilihLuarPulauGaransiTidak, $gakPilihLuarPulauGaransiTidak, $totalLuarPulauGaransiTidak);

        $arrayGaransi2 = [[
            "entropi"=>$entropiLuarPulauGaransiAda,
            "entropiType"=>"Ada",
            "entropiValue" => "1"
        ]
        ,[
            "entropi"=>$entropiLuarPulauGaransiTidak,
            "entropiType"=>"Tidak",
            "entropiValue" => "0.5"
        ]];

        
        $gainLuarPulauDiskon = $entropiLuarPulau - (($totalLuarPulauDiskonTinggi/$totalLuarPulau * $entropiLuarPulauDiskonTinggi) + ($totalLuarPulauDiskonRendah/$totalLuarPulau * $entropiLuarPulauDiskonRendah));

        $gainLuarPulauGaransi = $entropiLuarPulau - (($totalLuarPulauGaransiAda/$totalLuarPulau * $entropiLuarPulauGaransiAda) + ($totalLuarPulauGaransiTidak/$totalLuarPulau * $entropiLuarPulauGaransiTidak) );


        $array2 = [
        [
            "gain"=>$gainLuarPulauDiskon,
            "gainType"=>"Diskon"
        ],[
            "gain"=>$gainLuarPulauGaransi,
            "gainType"=>"Garansi"
        ]];
        $max2 = max(array_column($array2, 'gain'));
        // dd($max2);
        $maxG2 = "";
        foreach($array2 as $arr){
            if($arr["gain"] == $max2){
                $maxG2 = $arr["gainType"];
            }
        }
        //dd($array2);
        // uda dapat diskon

        $chosenEntropi3 = "";
         
        
        if($maxG2 == "Diskon"){
            $min = min(array_column($arrayDiskon2, 'entropi'));
            foreach($arrayDiskon2 as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi3 = $arr["entropiValue"];
                }
            }
        }else if($maxG2 == "Garansi"){
            $min = min(array_column($arrayGaransi2, 'entropi'));
            foreach($arrayGaransi2 as $arr){
                if($arr["entropi"] == $min){
                    $chosenEntropi3 = $arr["entropiValue"];
                }
            }
        }

        $arrayEntropi3 = [
            "type" => $maxG2,
            "value" => $chosenEntropi3,
            "defValue" => "0"
        ];

        array_push($arrayResult,$arrayEntropi3);

        return($arrayResult);
    }
    
}
    