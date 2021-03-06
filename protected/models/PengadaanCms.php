<?php

/**
 * This is the model class for table "tbl_pengadaan".
 *
 * The followings are the available columns in table 'tbl_pengadaan':
 * @property integer $id_pengadaan
 * @property string $judul
 * @property string $isi
 * @property string $tanggal
 * @property integer $id_user
 * @property integer $id_bidang
 * @property string $stts
 * @property string $status_pengadaan
 */
class PengadaanCms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PengadaanCms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul, isi, tanggal, id_user, id_bidang, stts, status_pengadaan', 'required'),
			array('id_user, id_bidang', 'numerical', 'integerOnly'=>true),
			array('judul', 'length', 'max'=>150),
			array('tanggal, status_pengadaan', 'length', 'max'=>30),
			array('stts', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pengadaan, judul, isi, tanggal, id_user, id_bidang, stts, status_pengadaan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Bidang'=>array(self::BELONGS_TO,'Bidang','id_bidang'),
			'UserBidang'=>array(self::BELONGS_TO,'UserBidang','id_user'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pengadaan' => 'Id Pengadaan',
			'judul' => 'Judul',
			'isi' => 'Isi',
			'tanggal' => 'Tanggal',
			'id_user' => 'Id User',
			'id_bidang' => 'Id Bidang',
			'stts' => 'Stts',
			'status_pengadaan' => 'Status Pengadaan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pengadaan',$this->id_pengadaan);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_bidang',$this->id_bidang);
		$criteria->compare('stts',$this->stts,true);
		$criteria->compare('status_pengadaan',$this->status_pengadaan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}