<?php 
class RegionDetails extends engineClass{
	function __construct(){
		parent::__construct();
	}

	public function getActorRegionName($regionCode){
		$stmt=$this->sql->Execute($this->sql->Prepare("SELECT REG_NAME FROM `cf_region` WHERE REG_CODE=".$this->sql->Param('a')." "),array($regionCode));
		if($stmt->RecordCount()>0){
			$obj = $stmt->FetchNextObject();
			return $obj->REG_NAME;
		}

	}
	public function getActorDistrictName($districtCode){
		$stmt= $this->sql->Execute($this->sql->Prepare("SELECT DIS_NAME FROM cf_district WHERE DIS_ID=".$this->sql->Param('a')." "),array($districtCode));
		if($stmt->RecordCount()>0){
			$obj = $stmt->FetchNextObject();
			return $obj->DIS_NAME;
		}

	}
	public function getBudgetSum($codeno){
		$stmt= $this->sql->Execute($this->sql->Prepare("SELECT SUM(BUDGD_AMT)AS TOT_SUM FROM cf_budget_details WHERE BUDGD_CODE=".$this->sql->Param('a')." "),array($codeno));
		if($stmt->RecordCount()>0){
			$obj =$stmt->FetchNextObject();
			return $obj->TOT_SUM;
		}else{
			return 0;
		}
	}
	public function getBudgetSumDistrict($codeno){
		$stmt= $this->sql->Execute($this->sql->Prepare("SELECT SUM(BUDGD_AMT)AS TOT_SUM FROM cf_budget_details WHERE BUDGD_CODE=".$this->sql->Param('a')." "),array($codeno));
		if($stmt->RecordCount()>0){
			$obj =$stmt->FetchNextObject();
			return $obj->TOT_SUM;
		}else{
			return 0;
		}
	}
}
?>