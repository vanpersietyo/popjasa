DELIMITER $$

ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_transaksi_pembelian` AS (
SELECT
  `trans_pembelian_b`.`ID_TRANS_B`    AS `ID_TRANS_B`,
  `trans_pembelian_b`.`ID_TRANS`      AS `ID_TRANS`,
  `trans_pembelian_b`.`KD_PRD`        AS `KD_PRD`,
  c.`NM_PRD`			      AS `NM_PRD`,
  `trans_pembelian_b`.`QTY_PRD`       AS `QTY_PRD`,
  `trans_pembelian_b`.`SATUAN_PRD`    AS `SATUAN_PRD`,
  d.`NM_SATUAN`			      AS `NM_SATUAN`,
  `trans_pembelian_b`.`HARGA_PRD`     AS `HARGA_PRD`,
  `trans_pembelian_b`.`TOTAL`         AS `TOTAL`,
  `trans_pembelian_b`.`KETERANGAN`    AS `KETERANGAN`,
  `trans_pembelian_b`.`ADD_BY`        AS `ADD_BY`,
  `trans_pembelian_b`.`DATE_CREATED`  AS `DATE_CREATED`,
  `trans_pembelian_b`.`MODIFIED_BY`   AS `MODIFIED_BY`,
  `trans_pembelian_b`.`DATE_MODIFIED` AS `DATE_MODIFIED`
FROM `trans_pembelian_b` b
JOIN `product` c 	ON b.`KD_PRD` = c.`KD_PRD`
JOIN satuan_product d  	ON b.`SATUAN_PRD` = d.`KD_SATUAN`)$$

DELIMITER ;