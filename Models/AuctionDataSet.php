<?php
require_once ('Models/Database.php');
require_once ('Models/AuctionData.php');

/**
 * Class AuctionDataSet
 */
class AuctionDataSet {
    protected $_dbInstance, $_dbHandle;

    /**
     * AuctionDataSet constructor.
     */
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    /**
     * Fetch all auction data from auction table
     * @return array
     */
    public function fetchAllAuctions()
    {
        $sqlQuery = 'SELECT * FROM auction';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet = [];
        while ($row = $statement->fetch())
        {
            $dataSet[] = new AuctionData($row);
        }
        return $dataSet;
    }

    /**
     * Get the name of user who organised the auction
     * @param $id
     * @return mixed
     */
    public function getAuctionAdmin($id)
    {
        $sqlQuery = "SELECT username FROM users, auction WHERE user_id = :id AND users.userID = auction.user_id";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function getTotalRecords($id)
    {
        $sqlQuery = "SELECT COUNT(auction_id) FROM Lots WHERE auction_id = :id";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchColumn();
    }
}
