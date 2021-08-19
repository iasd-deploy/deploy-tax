#!/bin/bash

wp menu delete sedes-regionales --allow-root
m1=$(wp menu create "Sedes Regionales" --porcelain --allow-root)

wp menu location assign $m1 multisite_aba2 --allow-root
wp menu location assign $m1 master_footer_3 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Argentina" http://ua.adventistas.org --description="02" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Argentina Central" http://aac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Argentina del Norte" http://aan.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Argentina del Sur" http://aas.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Bonarense" http://abo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Argentina del Centro Oeste" http://maco.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Argentina del Noroeste" http://mano.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Boliviana" http://ub.adventistas.org --description="03" --porcelain --allow-root)
wp menu item add-custom $m1 "Misión Boliviana Central" http://mbc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Boliviana Occidental" http://mbo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión del Oriente Boliviano" http://mob.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Central Brasileira" http://ucb.adventistas.org --description="05" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Paulista Central" http://apac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Paulista del Vale" http://apv.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Paulista Leste" http://apl.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Paulista Oeste" http://apo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Paulista Sudeleste" http://apso.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Paulista Sur" http://aps.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Paulistana" http://ap.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Paulista Sudeste" http://apse.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Centro-Oeste Brasileira" http://ucob.adventistas.org --description="07" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Brasil Central" http://abc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Mato-Grossense" http://amt.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Planalto Central" http://aplac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Sur Mato-Grossense" http://asm.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión del Tocantins" http://mto.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Chilena" http://uch.adventistas.org --description="12" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Centro Sur de Chile" http://acsch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Metropolitana de Chile" http://amch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Sur Austral de Chile" http://asach.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Central de Chile" http://mcch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Chilena del Pacífico" http://mchp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Norte de Chile" http://mnch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Sur Metropolitana de Chile" http://msmch.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Ecuatoriana" http://ue.adventistas.org --description="13" --porcelain --allow-root)
wp menu item add-custom $m1 "Misión Ecuatoriana del Norte" http://men.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Ecuatoriana del Sur" http://mes.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Leste Brasileira" http://ulb.adventistas.org --description="11" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Bahia" http://ab.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Bahia Central" http://abac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Bahia Sur" http://abs.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Bahia del Sudeleste" http://mbs.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Sergipe" http://ms.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Bahia Norte" http://mbn.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Nordeste Brasileira" http://uneb.adventistas.org --description="08" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Cearense" http://ace.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Pernambucana" http://ape.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Pernambucana Central" http://apec.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Alagoas" http://misal.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Nordeste" http://mn.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Piauiense" http://mpi.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Noroeste Brasileira" http://unob.adventistas.org --description="10" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Amazonas Roraima" http://aamar.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Amazônia Ocidental" http://aamo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Central Amazonas" http://aceam.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Sur de Rondônia" http://aSur.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Norte Brasileira" http://unb.adventistas.org --description="09" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Norte del Pará" http://anpa.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Maranhense" http://ama.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Sur del Pará" http://aspa.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Oeste del Pará" http://mopa.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Sur Maranhense" http://msma.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Pará Amapá" http://mpa.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Paraguaya" http://up.adventistas.org --description="14" --porcelain --allow-root)

u1=$(wp menu item add-custom $m1 "Unión Peruana del Norte" http://upn.adventistas.org --description="15" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Nor Pacífico del Perú" http://anop.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Peruana Central Este" http://apce.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Centro-Oeste del Perú" http://micop.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Nor Oriental" http://mno.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Peruana del Norte" http://mpn.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Peruana del Sur" http://ups.adventistas.org --description="16" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Peruana Central" http://apc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Andina Central" http://mac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión del lago Titicaca" http://mlt.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión del Oriente Peruano" http://mop.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Mision Peruana Central Sur" http://mpcs.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Peruana del Sur" http://mps.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Sur Oriental del Perú" http://msop.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Sudeste Brasileira" http://useb.adventistas.org --description="06" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Espírito Santense" http://aes.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Mineira Central" http://amc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Mineira Leste" http://aml.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Mineira Sur" http://ams.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Rio de Janeiro" http://arj.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Rio Fluminense" http://arf.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Rio Sur" http://ars.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Sur Espírito Santense" http://ases.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Mineira Norte" http://mmn.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Sur Brasileira" http://usb.adventistas.org --description="04" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociación Catarinense" http://ac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Central Paranaense" http://acp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Central Sur Rio-Grandense" http://acsr.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Norte Catarinense" http://anc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Norte Paranaense" http://anp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Sur Paranaense" http://asp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Sur Rio-Grandense" http://asr.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misión Ocidental Sur-Rio-Grandense" http://mosr.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociación Oeste Paranaense" http://aop.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "Unión Uruguaya" http://uu.adventistas.org --description="17" --porcelain --allow-root)
