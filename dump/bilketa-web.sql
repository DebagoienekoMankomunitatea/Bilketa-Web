--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.6
-- Dumped by pg_dump version 9.5.6

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: postgis; Type: EXTENSION; Schema: -; Owner:
--

CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;


--
-- Name: EXTENSION postgis; Type: COMMENT; Schema: -; Owner:
--

COMMENT ON EXTENSION postgis IS 'PostGIS geometry, geography, and raster spatial types and functions';


SET search_path = public, pg_catalog;

--
-- Name: TelefonosTipos; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "TelefonosTipos" AS ENUM (
    'movil',
    'fijo'
);


ALTER TYPE "TelefonosTipos" OWNER TO bilketa_web_user;

--
-- Name: estadoEncoding; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "estadoEncoding" AS ENUM (
    'pending',
    'encoding',
    'encoded',
    'error'
);


ALTER TYPE "estadoEncoding" OWNER TO bilketa_web_user;

--
-- Name: gravedadTiposIncidencias; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "gravedadTiposIncidencias" AS ENUM (
    'leve',
    'moderada',
    'grave',
    'muy grave'
);


ALTER TYPE "gravedadTiposIncidencias" OWNER TO bilketa_web_user;

--
-- Name: idiomaIvrContribuyentes; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "idiomaIvrContribuyentes" AS ENUM (
    'poste',
    'cubo',
    'compostador'
);


ALTER TYPE "idiomaIvrContribuyentes" OWNER TO bilketa_web_user;

--
-- Name: listadoIncidencia; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "listadoIncidencia" AS ENUM (
    'cubo',
    'poste',
    'compostador',
    'camion',
    'puntoRecogida',
    'contribuyente'
);


ALTER TYPE "listadoIncidencia" OWNER TO bilketa_web_user;

--
-- Name: listadoPrioridadResolucionIncidencia; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "listadoPrioridadResolucionIncidencia" AS ENUM (
    'email',
    'sms',
    'llamada'
);


ALTER TYPE "listadoPrioridadResolucionIncidencia" OWNER TO bilketa_web_user;

--
-- Name: listadoRecogidas; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "listadoRecogidas" AS ENUM (
    'puntoRecogida',
    'poste',
    'centroEmergencia'
);


ALTER TYPE "listadoRecogidas" OWNER TO bilketa_web_user;

--
-- Name: listadoSolucionesIncidencia; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "listadoSolucionesIncidencia" AS ENUM (
    'si',
    'no',
    'automatico'
);


ALTER TYPE "listadoSolucionesIncidencia" OWNER TO bilketa_web_user;

--
-- Name: listadoTipoIncidencia; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "listadoTipoIncidencia" AS ENUM (
    'poste',
    'cubo'
);


ALTER TYPE "listadoTipoIncidencia" OWNER TO bilketa_web_user;

--
-- Name: old_listadoTipoIncidencia; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "old_listadoTipoIncidencia" AS ENUM (
    'poste',
    'cubo',
    'compostador',
    'generico'
);


ALTER TYPE "old_listadoTipoIncidencia" OWNER TO bilketa_web_user;

--
-- Name: ordenTurnosRelCamiones; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "ordenTurnosRelCamiones" AS ENUM (
    'asc',
    'desc'
);


ALTER TYPE "ordenTurnosRelCamiones" OWNER TO bilketa_web_user;

--
-- Name: tipoOperario; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "tipoOperario" AS ENUM (
    'conductor',
    'operario',
    'gestorIncidencias'
);


ALTER TYPE "tipoOperario" OWNER TO bilketa_web_user;

--
-- Name: tiposTelefono; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "tiposTelefono" AS ENUM (
    '0',
    '1'
);


ALTER TYPE "tiposTelefono" OWNER TO bilketa_web_user;

--
-- Name: tipostelefono; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE tipostelefono AS ENUM (
    '0',
    '1'
);


ALTER TYPE tipostelefono OWNER TO bilketa_web_user;

--
-- Name: ubicacionCubos; Type: TYPE; Schema: public; Owner:
--

CREATE TYPE "ubicacionCubos" AS ENUM (
    'poste',
    'puntoRecogida',
    'centroEmergencia'
);


ALTER TYPE "ubicacionCubos" OWNER TO bilketa_web_user;

--
-- Name: addgeometrycolumn(character varying, character varying, integer, character varying, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION addgeometrycolumn(character varying, character varying, integer, character varying, integer) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	ret  text;
BEGIN
	SELECT AddGeometryColumn('','',$1,$2,$3,$4,$5) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.addgeometrycolumn(character varying, character varying, integer, character varying, integer) OWNER TO bilketa_web_user;

--
-- Name: addgeometrycolumn(character varying, character varying, character varying, integer, character varying, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION addgeometrycolumn(character varying, character varying, character varying, integer, character varying, integer) RETURNS text
    LANGUAGE plpgsql STABLE STRICT
    AS $_$
DECLARE
	ret  text;
BEGIN
	SELECT AddGeometryColumn('',$1,$2,$3,$4,$5,$6) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.addgeometrycolumn(character varying, character varying, character varying, integer, character varying, integer) OWNER TO bilketa_web_user;

--
-- Name: addgeometrycolumn(character varying, character varying, character varying, character varying, integer, character varying, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION addgeometrycolumn(character varying, character varying, character varying, character varying, integer, character varying, integer) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	catalog_name alias for $1;
	schema_name alias for $2;
	table_name alias for $3;
	column_name alias for $4;
	new_srid alias for $5;
	new_type alias for $6;
	new_dim alias for $7;
	rec RECORD;
	sr varchar;
	real_schema name;
	sql text;

BEGIN

	-- Verify geometry type
	IF ( NOT ( (new_type = 'GEOMETRY') OR
			   (new_type = 'GEOMETRYCOLLECTION') OR
			   (new_type = 'POINT') OR
			   (new_type = 'MULTIPOINT') OR
			   (new_type = 'POLYGON') OR
			   (new_type = 'MULTIPOLYGON') OR
			   (new_type = 'LINESTRING') OR
			   (new_type = 'MULTILINESTRING') OR
			   (new_type = 'GEOMETRYCOLLECTIONM') OR
			   (new_type = 'POINTM') OR
			   (new_type = 'MULTIPOINTM') OR
			   (new_type = 'POLYGONM') OR
			   (new_type = 'MULTIPOLYGONM') OR
			   (new_type = 'LINESTRINGM') OR
			   (new_type = 'MULTILINESTRINGM') OR
			   (new_type = 'CIRCULARSTRING') OR
			   (new_type = 'CIRCULARSTRINGM') OR
			   (new_type = 'COMPOUNDCURVE') OR
			   (new_type = 'COMPOUNDCURVEM') OR
			   (new_type = 'CURVEPOLYGON') OR
			   (new_type = 'CURVEPOLYGONM') OR
			   (new_type = 'MULTICURVE') OR
			   (new_type = 'MULTICURVEM') OR
			   (new_type = 'MULTISURFACE') OR
			   (new_type = 'MULTISURFACEM')) )
	THEN
		RAISE EXCEPTION 'Invalid type name - valid ones are:
	POINT, MULTIPOINT,
	LINESTRING, MULTILINESTRING,
	POLYGON, MULTIPOLYGON,
	CIRCULARSTRING, COMPOUNDCURVE, MULTICURVE,
	CURVEPOLYGON, MULTISURFACE,
	GEOMETRY, GEOMETRYCOLLECTION,
	POINTM, MULTIPOINTM,
	LINESTRINGM, MULTILINESTRINGM,
	POLYGONM, MULTIPOLYGONM,
	CIRCULARSTRINGM, COMPOUNDCURVEM, MULTICURVEM
	CURVEPOLYGONM, MULTISURFACEM,
	or GEOMETRYCOLLECTIONM';
		RETURN 'fail';
	END IF;


	-- Verify dimension
	IF ( (new_dim >4) OR (new_dim <0) ) THEN
		RAISE EXCEPTION 'invalid dimension';
		RETURN 'fail';
	END IF;

	IF ( (new_type LIKE '%M') AND (new_dim!=3) ) THEN
		RAISE EXCEPTION 'TypeM needs 3 dimensions';
		RETURN 'fail';
	END IF;


	-- Verify SRID
	IF ( new_srid != -1 ) THEN
		SELECT SRID INTO sr FROM spatial_ref_sys WHERE SRID = new_srid;
		IF NOT FOUND THEN
			RAISE EXCEPTION 'AddGeometryColumns() - invalid SRID';
			RETURN 'fail';
		END IF;
	END IF;


	-- Verify schema
	IF ( schema_name IS NOT NULL AND schema_name != '' ) THEN
		sql := 'SELECT nspname FROM pg_namespace ' ||
			'WHERE text(nspname) = ' || quote_literal(schema_name) ||
			'LIMIT 1';
		RAISE DEBUG '%', sql;
		EXECUTE sql INTO real_schema;

		IF ( real_schema IS NULL ) THEN
			RAISE EXCEPTION 'Schema % is not a valid schemaname', quote_literal(schema_name);
			RETURN 'fail';
		END IF;
	END IF;

	IF ( real_schema IS NULL ) THEN
		RAISE DEBUG 'Detecting schema';
		sql := 'SELECT n.nspname AS schemaname ' ||
			'FROM pg_catalog.pg_class c ' ||
			  'JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace ' ||
			'WHERE c.relkind = ' || quote_literal('r') ||
			' AND n.nspname NOT IN (' || quote_literal('pg_catalog') || ', ' || quote_literal('pg_toast') || ')' ||
			' AND pg_catalog.pg_table_is_visible(c.oid)' ||
			' AND c.relname = ' || quote_literal(table_name);
		RAISE DEBUG '%', sql;
		EXECUTE sql INTO real_schema;

		IF ( real_schema IS NULL ) THEN
			RAISE EXCEPTION 'Table % does not occur in the search_path', quote_literal(table_name);
			RETURN 'fail';
		END IF;
	END IF;


	-- Add geometry column to table
	sql := 'ALTER TABLE ' ||
		quote_ident(real_schema) || '.' || quote_ident(table_name)
		|| ' ADD COLUMN ' || quote_ident(column_name) ||
		' geometry ';
	RAISE DEBUG '%', sql;
	EXECUTE sql;


	-- Delete stale record in geometry_columns (if any)
	sql := 'DELETE FROM geometry_columns WHERE
		f_table_catalog = ' || quote_literal('') ||
		' AND f_table_schema = ' ||
		quote_literal(real_schema) ||
		' AND f_table_name = ' || quote_literal(table_name) ||
		' AND f_geometry_column = ' || quote_literal(column_name);
	RAISE DEBUG '%', sql;
	EXECUTE sql;


	-- Add record in geometry_columns
	sql := 'INSERT INTO geometry_columns (f_table_catalog,f_table_schema,f_table_name,' ||
										  'f_geometry_column,coord_dimension,srid,type)' ||
		' VALUES (' ||
		quote_literal('') || ',' ||
		quote_literal(real_schema) || ',' ||
		quote_literal(table_name) || ',' ||
		quote_literal(column_name) || ',' ||
		new_dim::text || ',' ||
		new_srid::text || ',' ||
		quote_literal(new_type) || ')';
	RAISE DEBUG '%', sql;
	EXECUTE sql;


	-- Add table CHECKs
	sql := 'ALTER TABLE ' ||
		quote_ident(real_schema) || '.' || quote_ident(table_name)
		|| ' ADD CONSTRAINT '
		|| quote_ident('enforce_srid_' || column_name)
		|| ' CHECK (ST_SRID(' || quote_ident(column_name) ||
		') = ' || new_srid::text || ')' ;
	RAISE DEBUG '%', sql;
	EXECUTE sql;

	sql := 'ALTER TABLE ' ||
		quote_ident(real_schema) || '.' || quote_ident(table_name)
		|| ' ADD CONSTRAINT '
		|| quote_ident('enforce_dims_' || column_name)
		|| ' CHECK (ST_NDims(' || quote_ident(column_name) ||
		') = ' || new_dim::text || ')' ;
	RAISE DEBUG '%', sql;
	EXECUTE sql;

	IF ( NOT (new_type = 'GEOMETRY')) THEN
		sql := 'ALTER TABLE ' ||
			quote_ident(real_schema) || '.' || quote_ident(table_name) || ' ADD CONSTRAINT ' ||
			quote_ident('enforce_geotype_' || column_name) ||
			' CHECK (GeometryType(' ||
			quote_ident(column_name) || ')=' ||
			quote_literal(new_type) || ' OR (' ||
			quote_ident(column_name) || ') is null)';
		RAISE DEBUG '%', sql;
		EXECUTE sql;
	END IF;

	RETURN
		real_schema || '.' ||
		table_name || '.' || column_name ||
		' SRID:' || new_srid::text ||
		' TYPE:' || new_type ||
		' DIMS:' || new_dim::text || ' ';
END;
$_$;


ALTER FUNCTION public.addgeometrycolumn(character varying, character varying, character varying, character varying, integer, character varying, integer) OWNER TO bilketa_web_user;

--
-- Name: affine(geometry, double precision, double precision, double precision, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION affine(geometry, double precision, double precision, double precision, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT affine($1,  $2, $3, 0,  $4, $5, 0,  0, 0, 1,  $6, $7, 0)$_$;


ALTER FUNCTION public.affine(geometry, double precision, double precision, double precision, double precision, double precision, double precision) OWNER TO bilketa_web_user;

--
-- Name: asgml(geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION asgml(geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML(2, $1, 15, 0)$_$;


ALTER FUNCTION public.asgml(geometry) OWNER TO bilketa_web_user;

--
-- Name: asgml(geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION asgml(geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML(2, $1, $2, 0)$_$;


ALTER FUNCTION public.asgml(geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: askml(geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION askml(geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML(2, transform($1,4326), 15)$_$;


ALTER FUNCTION public.askml(geometry) OWNER TO bilketa_web_user;

--
-- Name: askml(geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION askml(geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML(2, transform($1,4326), $2)$_$;


ALTER FUNCTION public.askml(geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: askml(integer, geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION askml(integer, geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML($1, transform($2,4326), $3)$_$;


ALTER FUNCTION public.askml(integer, geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: bdmpolyfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION bdmpolyfromtext(text, integer) RETURNS geometry
    LANGUAGE plpgsql IMMUTABLE STRICT
    AS $_$
DECLARE
	geomtext alias for $1;
	srid alias for $2;
	mline geometry;
	geom geometry;
BEGIN
	mline := MultiLineStringFromText(geomtext, srid);

	IF mline IS NULL
	THEN
		RAISE EXCEPTION 'Input is not a MultiLinestring';
	END IF;

	geom := multi(BuildArea(mline));

	RETURN geom;
END;
$_$;


ALTER FUNCTION public.bdmpolyfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: bdpolyfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION bdpolyfromtext(text, integer) RETURNS geometry
    LANGUAGE plpgsql IMMUTABLE STRICT
    AS $_$
DECLARE
	geomtext alias for $1;
	srid alias for $2;
	mline geometry;
	geom geometry;
BEGIN
	mline := MultiLineStringFromText(geomtext, srid);

	IF mline IS NULL
	THEN
		RAISE EXCEPTION 'Input is not a MultiLinestring';
	END IF;

	geom := BuildArea(mline);

	IF GeometryType(geom) != 'POLYGON'
	THEN
		RAISE EXCEPTION 'Input returns more then a single polygon, try using BdMPolyFromText instead';
	END IF;

	RETURN geom;
END;
$_$;


ALTER FUNCTION public.bdpolyfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: buffer(geometry, double precision, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION buffer(geometry, double precision, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT ST_Buffer($1, $2, $3)$_$;


ALTER FUNCTION public.buffer(geometry, double precision, integer) OWNER TO bilketa_web_user;

--
-- Name: find_extent(text, text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION find_extent(text, text) RETURNS box2d
    LANGUAGE plpgsql IMMUTABLE STRICT
    AS $_$
DECLARE
	tablename alias for $1;
	columnname alias for $2;
	myrec RECORD;

BEGIN
	FOR myrec IN EXECUTE 'SELECT extent("' || columnname || '") FROM "' || tablename || '"' LOOP
		return myrec.extent;
	END LOOP;
END;
$_$;


ALTER FUNCTION public.find_extent(text, text) OWNER TO bilketa_web_user;

--
-- Name: find_extent(text, text, text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION find_extent(text, text, text) RETURNS box2d
    LANGUAGE plpgsql IMMUTABLE STRICT
    AS $_$
DECLARE
	schemaname alias for $1;
	tablename alias for $2;
	columnname alias for $3;
	myrec RECORD;

BEGIN
	FOR myrec IN EXECUTE 'SELECT extent("' || columnname || '") FROM "' || schemaname || '"."' || tablename || '"' LOOP
		return myrec.extent;
	END LOOP;
END;
$_$;


ALTER FUNCTION public.find_extent(text, text, text) OWNER TO bilketa_web_user;

--
-- Name: fix_geometry_columns(); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION fix_geometry_columns() RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
	mislinked record;
	result text;
	linked integer;
	deleted integer;
	foundschema integer;
BEGIN

	-- Since 7.3 schema support has been added.
	-- Previous postgis versions used to put the database name in
	-- the schema column. This needs to be fixed, so we try to
	-- set the correct schema for each geometry_colums record
	-- looking at table, column, type and srid.
	UPDATE geometry_columns SET f_table_schema = n.nspname
		FROM pg_namespace n, pg_class c, pg_attribute a,
			pg_constraint sridcheck, pg_constraint typecheck
			WHERE ( f_table_schema is NULL
		OR f_table_schema = ''
			OR f_table_schema NOT IN (
					SELECT nspname::varchar
					FROM pg_namespace nn, pg_class cc, pg_attribute aa
					WHERE cc.relnamespace = nn.oid
					AND cc.relname = f_table_name::name
					AND aa.attrelid = cc.oid
					AND aa.attname = f_geometry_column::name))
			AND f_table_name::name = c.relname
			AND c.oid = a.attrelid
			AND c.relnamespace = n.oid
			AND f_geometry_column::name = a.attname

			AND sridcheck.conrelid = c.oid
		AND sridcheck.consrc LIKE '(srid(% = %)'
			AND sridcheck.consrc ~ textcat(' = ', srid::text)

			AND typecheck.conrelid = c.oid
		AND typecheck.consrc LIKE
		'((geometrytype(%) = ''%''::text) OR (% IS NULL))'
			AND typecheck.consrc ~ textcat(' = ''', type::text)

			AND NOT EXISTS (
					SELECT oid FROM geometry_columns gc
					WHERE c.relname::varchar = gc.f_table_name
					AND n.nspname::varchar = gc.f_table_schema
					AND a.attname::varchar = gc.f_geometry_column
			);

	GET DIAGNOSTICS foundschema = ROW_COUNT;

	-- no linkage to system table needed
	return 'fixed:'||foundschema::text;

END;
$$;


ALTER FUNCTION public.fix_geometry_columns() OWNER TO bilketa_web_user;

--
-- Name: geomcollfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION geomcollfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE
	WHEN geometrytype(GeomFromText($1)) = 'GEOMETRYCOLLECTION'
	THEN GeomFromText($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.geomcollfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: geomcollfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION geomcollfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE
	WHEN geometrytype(GeomFromText($1, $2)) = 'GEOMETRYCOLLECTION'
	THEN GeomFromText($1,$2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.geomcollfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: geomcollfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION geomcollfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE
	WHEN geometrytype(GeomFromWKB($1)) = 'GEOMETRYCOLLECTION'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.geomcollfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: geomcollfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION geomcollfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE
	WHEN geometrytype(GeomFromWKB($1, $2)) = 'GEOMETRYCOLLECTION'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.geomcollfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: geomfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION geomfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT geometryfromtext($1)$_$;


ALTER FUNCTION public.geomfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: geomfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION geomfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT geometryfromtext($1, $2)$_$;


ALTER FUNCTION public.geomfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: geomfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION geomfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT setSRID(GeomFromWKB($1), $2)$_$;


ALTER FUNCTION public.geomfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: linefromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linefromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1)) = 'LINESTRING'
	THEN GeomFromText($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.linefromtext(text) OWNER TO bilketa_web_user;

--
-- Name: linefromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linefromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1, $2)) = 'LINESTRING'
	THEN GeomFromText($1,$2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.linefromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: linefromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linefromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'LINESTRING'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.linefromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: linefromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linefromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'LINESTRING'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.linefromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: linestringfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linestringfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT LineFromText($1)$_$;


ALTER FUNCTION public.linestringfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: linestringfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linestringfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT LineFromText($1, $2)$_$;


ALTER FUNCTION public.linestringfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: linestringfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linestringfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'LINESTRING'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.linestringfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: linestringfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION linestringfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'LINESTRING'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.linestringfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: locate_along_measure(geometry, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION locate_along_measure(geometry, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT locate_between_measures($1, $2, $2) $_$;


ALTER FUNCTION public.locate_along_measure(geometry, double precision) OWNER TO bilketa_web_user;

--
-- Name: mlinefromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mlinefromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1)) = 'MULTILINESTRING'
	THEN GeomFromText($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mlinefromtext(text) OWNER TO bilketa_web_user;

--
-- Name: mlinefromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mlinefromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE
	WHEN geometrytype(GeomFromText($1, $2)) = 'MULTILINESTRING'
	THEN GeomFromText($1,$2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mlinefromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: mlinefromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mlinefromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'MULTILINESTRING'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mlinefromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: mlinefromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mlinefromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'MULTILINESTRING'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mlinefromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: mpointfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpointfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1)) = 'MULTIPOINT'
	THEN GeomFromText($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpointfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: mpointfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpointfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1,$2)) = 'MULTIPOINT'
	THEN GeomFromText($1,$2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpointfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: mpointfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpointfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'MULTIPOINT'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpointfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: mpointfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpointfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1,$2)) = 'MULTIPOINT'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpointfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: mpolyfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpolyfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1)) = 'MULTIPOLYGON'
	THEN GeomFromText($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpolyfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: mpolyfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpolyfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1, $2)) = 'MULTIPOLYGON'
	THEN GeomFromText($1,$2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpolyfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: mpolyfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpolyfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'MULTIPOLYGON'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpolyfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: mpolyfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION mpolyfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'MULTIPOLYGON'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.mpolyfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: multilinefromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multilinefromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'MULTILINESTRING'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.multilinefromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: multilinefromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multilinefromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'MULTILINESTRING'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.multilinefromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: multilinestringfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multilinestringfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT ST_MLineFromText($1)$_$;


ALTER FUNCTION public.multilinestringfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: multilinestringfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multilinestringfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT MLineFromText($1, $2)$_$;


ALTER FUNCTION public.multilinestringfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: multipointfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipointfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT MPointFromText($1)$_$;


ALTER FUNCTION public.multipointfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: multipointfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipointfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT MPointFromText($1, $2)$_$;


ALTER FUNCTION public.multipointfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: multipointfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipointfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'MULTIPOINT'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.multipointfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: multipointfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipointfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1,$2)) = 'MULTIPOINT'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.multipointfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: multipolyfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipolyfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'MULTIPOLYGON'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.multipolyfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: multipolyfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipolyfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'MULTIPOLYGON'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.multipolyfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: multipolygonfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipolygonfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT MPolyFromText($1)$_$;


ALTER FUNCTION public.multipolygonfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: multipolygonfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION multipolygonfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT MPolyFromText($1, $2)$_$;


ALTER FUNCTION public.multipolygonfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: pointfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION pointfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1)) = 'POINT'
	THEN GeomFromText($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.pointfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: pointfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION pointfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1, $2)) = 'POINT'
	THEN GeomFromText($1,$2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.pointfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: pointfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION pointfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'POINT'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.pointfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: pointfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION pointfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'POINT'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.pointfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: polyfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polyfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1)) = 'POLYGON'
	THEN GeomFromText($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.polyfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: polyfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polyfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromText($1, $2)) = 'POLYGON'
	THEN GeomFromText($1,$2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.polyfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: polyfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polyfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'POLYGON'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.polyfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: polyfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polyfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1, $2)) = 'POLYGON'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.polyfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: polygonfromtext(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polygonfromtext(text) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT PolyFromText($1)$_$;


ALTER FUNCTION public.polygonfromtext(text) OWNER TO bilketa_web_user;

--
-- Name: polygonfromtext(text, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polygonfromtext(text, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT PolyFromText($1, $2)$_$;


ALTER FUNCTION public.polygonfromtext(text, integer) OWNER TO bilketa_web_user;

--
-- Name: polygonfromwkb(bytea); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polygonfromwkb(bytea) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1)) = 'POLYGON'
	THEN GeomFromWKB($1)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.polygonfromwkb(bytea) OWNER TO bilketa_web_user;

--
-- Name: polygonfromwkb(bytea, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION polygonfromwkb(bytea, integer) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT CASE WHEN geometrytype(GeomFromWKB($1,$2)) = 'POLYGON'
	THEN GeomFromWKB($1, $2)
	ELSE NULL END
	$_$;


ALTER FUNCTION public.polygonfromwkb(bytea, integer) OWNER TO bilketa_web_user;

--
-- Name: populate_geometry_columns(); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION populate_geometry_columns() RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
	inserted    integer;
	oldcount    integer;
	probed      integer;
	stale       integer;
	gcs         RECORD;
	gc          RECORD;
	gsrid       integer;
	gndims      integer;
	gtype       text;
	query       text;
	gc_is_valid boolean;

BEGIN
	SELECT count(*) INTO oldcount FROM geometry_columns;
	inserted := 0;

	EXECUTE 'TRUNCATE geometry_columns';

	-- Count the number of geometry columns in all tables and views
	SELECT count(DISTINCT c.oid) INTO probed
	FROM pg_class c,
		 pg_attribute a,
		 pg_type t,
		 pg_namespace n
	WHERE (c.relkind = 'r' OR c.relkind = 'v')
	AND t.typname = 'geometry'
	AND a.attisdropped = false
	AND a.atttypid = t.oid
	AND a.attrelid = c.oid
	AND c.relnamespace = n.oid
	AND n.nspname NOT ILIKE 'pg_temp%';

	-- Iterate through all non-dropped geometry columns
	RAISE DEBUG 'Processing Tables.....';

	FOR gcs IN
	SELECT DISTINCT ON (c.oid) c.oid, n.nspname, c.relname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'r'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND n.nspname NOT ILIKE 'pg_temp%'
	LOOP

	inserted := inserted + populate_geometry_columns(gcs.oid);
	END LOOP;

	-- Add views to geometry columns table
	RAISE DEBUG 'Processing Views.....';
	FOR gcs IN
	SELECT DISTINCT ON (c.oid) c.oid, n.nspname, c.relname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'v'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
	LOOP

	inserted := inserted + populate_geometry_columns(gcs.oid);
	END LOOP;

	IF oldcount > inserted THEN
	stale = oldcount-inserted;
	ELSE
	stale = 0;
	END IF;

	RETURN 'probed:' ||probed|| ' inserted:'||inserted|| ' conflicts:'||probed-inserted|| ' deleted:'||stale;
END

$$;


ALTER FUNCTION public.populate_geometry_columns() OWNER TO bilketa_web_user;

--
-- Name: populate_geometry_columns(oid); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION populate_geometry_columns(tbl_oid oid) RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
	gcs         RECORD;
	gc          RECORD;
	gsrid       integer;
	gndims      integer;
	gtype       text;
	query       text;
	gc_is_valid boolean;
	inserted    integer;

BEGIN
	inserted := 0;

	-- Iterate through all geometry columns in this table
	FOR gcs IN
	SELECT n.nspname, c.relname, a.attname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'r'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND n.nspname NOT ILIKE 'pg_temp%'
		AND c.oid = tbl_oid
	LOOP

	RAISE DEBUG 'Processing table %.%.%', gcs.nspname, gcs.relname, gcs.attname;

	DELETE FROM geometry_columns
	  WHERE f_table_schema = gcs.nspname
	  AND f_table_name = gcs.relname
	  AND f_geometry_column = gcs.attname;

	gc_is_valid := true;

	-- Try to find srid check from system tables (pg_constraint)
	gsrid :=
		(SELECT replace(replace(split_part(s.consrc, ' = ', 2), ')', ''), '(', '')
		 FROM pg_class c, pg_namespace n, pg_attribute a, pg_constraint s
		 WHERE n.nspname = gcs.nspname
		 AND c.relname = gcs.relname
		 AND a.attname = gcs.attname
		 AND a.attrelid = c.oid
		 AND s.connamespace = n.oid
		 AND s.conrelid = c.oid
		 AND a.attnum = ANY (s.conkey)
		 AND s.consrc LIKE '%srid(% = %');
	IF (gsrid IS NULL) THEN
		-- Try to find srid from the geometry itself
		EXECUTE 'SELECT srid(' || quote_ident(gcs.attname) || ')
				 FROM ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gsrid := gc.srid;

		-- Try to apply srid check to column
		IF (gsrid IS NOT NULL) THEN
			BEGIN
				EXECUTE 'ALTER TABLE ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
						 ADD CONSTRAINT ' || quote_ident('enforce_srid_' || gcs.attname) || '
						 CHECK (srid(' || quote_ident(gcs.attname) || ') = ' || gsrid || ')';
			EXCEPTION
				WHEN check_violation THEN
					RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not apply constraint CHECK (srid(%) = %)', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname), quote_ident(gcs.attname), gsrid;
					gc_is_valid := false;
			END;
		END IF;
	END IF;

	-- Try to find ndims check from system tables (pg_constraint)
	gndims :=
		(SELECT replace(split_part(s.consrc, ' = ', 2), ')', '')
		 FROM pg_class c, pg_namespace n, pg_attribute a, pg_constraint s
		 WHERE n.nspname = gcs.nspname
		 AND c.relname = gcs.relname
		 AND a.attname = gcs.attname
		 AND a.attrelid = c.oid
		 AND s.connamespace = n.oid
		 AND s.conrelid = c.oid
		 AND a.attnum = ANY (s.conkey)
		 AND s.consrc LIKE '%ndims(% = %');
	IF (gndims IS NULL) THEN
		-- Try to find ndims from the geometry itself
		EXECUTE 'SELECT ndims(' || quote_ident(gcs.attname) || ')
				 FROM ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gndims := gc.ndims;

		-- Try to apply ndims check to column
		IF (gndims IS NOT NULL) THEN
			BEGIN
				EXECUTE 'ALTER TABLE ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
						 ADD CONSTRAINT ' || quote_ident('enforce_dims_' || gcs.attname) || '
						 CHECK (ndims(' || quote_ident(gcs.attname) || ') = '||gndims||')';
			EXCEPTION
				WHEN check_violation THEN
					RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not apply constraint CHECK (ndims(%) = %)', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname), quote_ident(gcs.attname), gndims;
					gc_is_valid := false;
			END;
		END IF;
	END IF;

	-- Try to find geotype check from system tables (pg_constraint)
	gtype :=
		(SELECT replace(split_part(s.consrc, '''', 2), ')', '')
		 FROM pg_class c, pg_namespace n, pg_attribute a, pg_constraint s
		 WHERE n.nspname = gcs.nspname
		 AND c.relname = gcs.relname
		 AND a.attname = gcs.attname
		 AND a.attrelid = c.oid
		 AND s.connamespace = n.oid
		 AND s.conrelid = c.oid
		 AND a.attnum = ANY (s.conkey)
		 AND s.consrc LIKE '%geometrytype(% = %');
	IF (gtype IS NULL) THEN
		-- Try to find geotype from the geometry itself
		EXECUTE 'SELECT geometrytype(' || quote_ident(gcs.attname) || ')
				 FROM ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gtype := gc.geometrytype;
		--IF (gtype IS NULL) THEN
		--    gtype := 'GEOMETRY';
		--END IF;

		-- Try to apply geometrytype check to column
		IF (gtype IS NOT NULL) THEN
			BEGIN
				EXECUTE 'ALTER TABLE ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				ADD CONSTRAINT ' || quote_ident('enforce_geotype_' || gcs.attname) || '
				CHECK ((geometrytype(' || quote_ident(gcs.attname) || ') = ' || quote_literal(gtype) || ') OR (' || quote_ident(gcs.attname) || ' IS NULL))';
			EXCEPTION
				WHEN check_violation THEN
					-- No geometry check can be applied. This column contains a number of geometry types.
					RAISE WARNING 'Could not add geometry type check (%) to table column: %.%.%', gtype, quote_ident(gcs.nspname),quote_ident(gcs.relname),quote_ident(gcs.attname);
			END;
		END IF;
	END IF;

	IF (gsrid IS NULL) THEN
		RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine the srid', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
	ELSIF (gndims IS NULL) THEN
		RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine the number of dimensions', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
	ELSIF (gtype IS NULL) THEN
		RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine the geometry type', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
	ELSE
		-- Only insert into geometry_columns if table constraints could be applied.
		IF (gc_is_valid) THEN
			INSERT INTO geometry_columns (f_table_catalog,f_table_schema, f_table_name, f_geometry_column, coord_dimension, srid, type)
			VALUES ('', gcs.nspname, gcs.relname, gcs.attname, gndims, gsrid, gtype);
			inserted := inserted + 1;
		END IF;
	END IF;
	END LOOP;

	-- Add views to geometry columns table
	FOR gcs IN
	SELECT n.nspname, c.relname, a.attname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'v'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND n.nspname NOT ILIKE 'pg_temp%'
		AND c.oid = tbl_oid
	LOOP
		RAISE DEBUG 'Processing view %.%.%', gcs.nspname, gcs.relname, gcs.attname;

	DELETE FROM geometry_columns
	  WHERE f_table_schema = gcs.nspname
	  AND f_table_name = gcs.relname
	  AND f_geometry_column = gcs.attname;

		EXECUTE 'SELECT ndims(' || quote_ident(gcs.attname) || ')
				 FROM ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gndims := gc.ndims;

		EXECUTE 'SELECT srid(' || quote_ident(gcs.attname) || ')
				 FROM ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gsrid := gc.srid;

		EXECUTE 'SELECT geometrytype(' || quote_ident(gcs.attname) || ')
				 FROM ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gtype := gc.geometrytype;

		IF (gndims IS NULL) THEN
			RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine ndims', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
		ELSIF (gsrid IS NULL) THEN
			RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine srid', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
		ELSIF (gtype IS NULL) THEN
			RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine gtype', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
		ELSE
			query := 'INSERT INTO geometry_columns (f_table_catalog,f_table_schema, f_table_name, f_geometry_column, coord_dimension, srid, type) ' ||
					 'VALUES ('''', ' || quote_literal(gcs.nspname) || ',' || quote_literal(gcs.relname) || ',' || quote_literal(gcs.attname) || ',' || gndims || ',' || gsrid || ',' || quote_literal(gtype) || ')';
			EXECUTE query;
			inserted := inserted + 1;
		END IF;
	END LOOP;

	RETURN inserted;
END

$$;


ALTER FUNCTION public.populate_geometry_columns(tbl_oid oid) OWNER TO bilketa_web_user;

--
-- Name: probe_geometry_columns(); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION probe_geometry_columns() RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
	inserted integer;
	oldcount integer;
	probed integer;
	stale integer;
BEGIN

	SELECT count(*) INTO oldcount FROM geometry_columns;

	SELECT count(*) INTO probed
		FROM pg_class c, pg_attribute a, pg_type t,
			pg_namespace n,
			pg_constraint sridcheck, pg_constraint typecheck

		WHERE t.typname = 'geometry'
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND sridcheck.connamespace = n.oid
		AND typecheck.connamespace = n.oid
		AND sridcheck.conrelid = c.oid
		AND sridcheck.consrc LIKE '(srid('||a.attname||') = %)'
		AND typecheck.conrelid = c.oid
		AND typecheck.consrc LIKE
		'((geometrytype('||a.attname||') = ''%''::text) OR (% IS NULL))'
		;

	INSERT INTO geometry_columns SELECT
		''::varchar as f_table_catalogue,
		n.nspname::varchar as f_table_schema,
		c.relname::varchar as f_table_name,
		a.attname::varchar as f_geometry_column,
		2 as coord_dimension,
		trim(both  ' =)' from
			replace(replace(split_part(
				sridcheck.consrc, ' = ', 2), ')', ''), '(', ''))::integer AS srid,
		trim(both ' =)''' from substr(typecheck.consrc,
			strpos(typecheck.consrc, '='),
			strpos(typecheck.consrc, '::')-
			strpos(typecheck.consrc, '=')
			))::varchar as type
		FROM pg_class c, pg_attribute a, pg_type t,
			pg_namespace n,
			pg_constraint sridcheck, pg_constraint typecheck
		WHERE t.typname = 'geometry'
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND sridcheck.connamespace = n.oid
		AND typecheck.connamespace = n.oid
		AND sridcheck.conrelid = c.oid
		AND sridcheck.consrc LIKE '(st_srid('||a.attname||') = %)'
		AND typecheck.conrelid = c.oid
		AND typecheck.consrc LIKE
		'((geometrytype('||a.attname||') = ''%''::text) OR (% IS NULL))'

			AND NOT EXISTS (
					SELECT oid FROM geometry_columns gc
					WHERE c.relname::varchar = gc.f_table_name
					AND n.nspname::varchar = gc.f_table_schema
					AND a.attname::varchar = gc.f_geometry_column
			);

	GET DIAGNOSTICS inserted = ROW_COUNT;

	IF oldcount > probed THEN
		stale = oldcount-probed;
	ELSE
		stale = 0;
	END IF;

	RETURN 'probed:'||probed::text||
		' inserted:'||inserted::text||
		' conflicts:'||(probed-inserted)::text||
		' stale:'||stale::text;
END

$$;


ALTER FUNCTION public.probe_geometry_columns() OWNER TO bilketa_web_user;

--
-- Name: rename_geometry_table_constraints(); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION rename_geometry_table_constraints() RETURNS text
    LANGUAGE sql IMMUTABLE
    AS $$
SELECT 'rename_geometry_table_constraint() is obsoleted'::text
$$;


ALTER FUNCTION public.rename_geometry_table_constraints() OWNER TO bilketa_web_user;

--
-- Name: rotate(geometry, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION rotate(geometry, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT rotateZ($1, $2)$_$;


ALTER FUNCTION public.rotate(geometry, double precision) OWNER TO bilketa_web_user;

--
-- Name: rotatex(geometry, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION rotatex(geometry, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT affine($1, 1, 0, 0, 0, cos($2), -sin($2), 0, sin($2), cos($2), 0, 0, 0)$_$;


ALTER FUNCTION public.rotatex(geometry, double precision) OWNER TO bilketa_web_user;

--
-- Name: rotatey(geometry, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION rotatey(geometry, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT affine($1,  cos($2), 0, sin($2),  0, 1, 0,  -sin($2), 0, cos($2), 0,  0, 0)$_$;


ALTER FUNCTION public.rotatey(geometry, double precision) OWNER TO bilketa_web_user;

--
-- Name: rotatez(geometry, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION rotatez(geometry, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT affine($1,  cos($2), -sin($2), 0,  sin($2), cos($2), 0,  0, 0, 1,  0, 0, 0)$_$;


ALTER FUNCTION public.rotatez(geometry, double precision) OWNER TO bilketa_web_user;

--
-- Name: scale(geometry, double precision, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION scale(geometry, double precision, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT scale($1, $2, $3, 1)$_$;


ALTER FUNCTION public.scale(geometry, double precision, double precision) OWNER TO bilketa_web_user;

--
-- Name: scale(geometry, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION scale(geometry, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT affine($1,  $2, 0, 0,  0, $3, 0,  0, 0, $4,  0, 0, 0)$_$;


ALTER FUNCTION public.scale(geometry, double precision, double precision, double precision) OWNER TO bilketa_web_user;

--
-- Name: se_envelopesintersect(geometry, geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION se_envelopesintersect(geometry, geometry) RETURNS boolean
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$
	SELECT $1 && $2
	$_$;


ALTER FUNCTION public.se_envelopesintersect(geometry, geometry) OWNER TO bilketa_web_user;

--
-- Name: se_locatealong(geometry, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION se_locatealong(geometry, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT locate_between_measures($1, $2, $2) $_$;


ALTER FUNCTION public.se_locatealong(geometry, double precision) OWNER TO bilketa_web_user;

--
-- Name: snaptogrid(geometry, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION snaptogrid(geometry, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT SnapToGrid($1, 0, 0, $2, $2)$_$;


ALTER FUNCTION public.snaptogrid(geometry, double precision) OWNER TO bilketa_web_user;

--
-- Name: snaptogrid(geometry, double precision, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION snaptogrid(geometry, double precision, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT SnapToGrid($1, 0, 0, $2, $3)$_$;


ALTER FUNCTION public.snaptogrid(geometry, double precision, double precision) OWNER TO bilketa_web_user;

--
-- Name: st_area(geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_area(geography) RETURNS double precision
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT ST_Area($1, true)$_$;


ALTER FUNCTION public.st_area(geography) OWNER TO bilketa_web_user;

--
-- Name: st_asbinary(text); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asbinary(text) RETURNS bytea
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_AsBinary($1::geometry);  $_$;


ALTER FUNCTION public.st_asbinary(text) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(geography) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson(1, $1, 15, 0)$_$;


ALTER FUNCTION public.st_asgeojson(geography) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson(1, $1, 15, 0)$_$;


ALTER FUNCTION public.st_asgeojson(geometry) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(integer, geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(integer, geography) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson($1, $2, 15, 0)$_$;


ALTER FUNCTION public.st_asgeojson(integer, geography) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(integer, geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(integer, geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson($1, $2, 15, 0)$_$;


ALTER FUNCTION public.st_asgeojson(integer, geometry) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(geography, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(geography, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson(1, $1, $2, 0)$_$;


ALTER FUNCTION public.st_asgeojson(geography, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson(1, $1, $2, 0)$_$;


ALTER FUNCTION public.st_asgeojson(geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(integer, geography, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(integer, geography, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson($1, $2, $3, 0)$_$;


ALTER FUNCTION public.st_asgeojson(integer, geography, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgeojson(integer, geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgeojson(integer, geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGeoJson($1, $2, $3, 0)$_$;


ALTER FUNCTION public.st_asgeojson(integer, geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(geography) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML(2, $1, 15, 0)$_$;


ALTER FUNCTION public.st_asgml(geography) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML(2, $1, 15, 0)$_$;


ALTER FUNCTION public.st_asgml(geometry) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(integer, geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(integer, geography) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML($1, $2, 15, 0)$_$;


ALTER FUNCTION public.st_asgml(integer, geography) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(integer, geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(integer, geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML($1, $2, 15, 0)$_$;


ALTER FUNCTION public.st_asgml(integer, geometry) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(geography, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(geography, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML(2, $1, $2, 0)$_$;


ALTER FUNCTION public.st_asgml(geography, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML(2, $1, $2, 0)$_$;


ALTER FUNCTION public.st_asgml(geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(integer, geography, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(integer, geography, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML($1, $2, $3, 0)$_$;


ALTER FUNCTION public.st_asgml(integer, geography, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(integer, geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(integer, geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML($1, $2, $3, 0)$_$;


ALTER FUNCTION public.st_asgml(integer, geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(integer, geography, integer, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(integer, geography, integer, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML($1, $2, $3, $4)$_$;


ALTER FUNCTION public.st_asgml(integer, geography, integer, integer) OWNER TO bilketa_web_user;

--
-- Name: st_asgml(integer, geometry, integer, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_asgml(integer, geometry, integer, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsGML($1, $2, $3, $4)$_$;


ALTER FUNCTION public.st_asgml(integer, geometry, integer, integer) OWNER TO bilketa_web_user;

--
-- Name: st_askml(geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_askml(geography) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML(2, $1, 15)$_$;


ALTER FUNCTION public.st_askml(geography) OWNER TO bilketa_web_user;

--
-- Name: st_askml(geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_askml(geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML(2, ST_Transform($1,4326), 15)$_$;


ALTER FUNCTION public.st_askml(geometry) OWNER TO bilketa_web_user;

--
-- Name: st_askml(integer, geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_askml(integer, geography) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML($1, $2, 15)$_$;


ALTER FUNCTION public.st_askml(integer, geography) OWNER TO bilketa_web_user;

--
-- Name: st_askml(integer, geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_askml(integer, geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML($1, ST_Transform($2,4326), 15)$_$;


ALTER FUNCTION public.st_askml(integer, geometry) OWNER TO bilketa_web_user;

--
-- Name: st_askml(integer, geography, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_askml(integer, geography, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML($1, $2, $3)$_$;


ALTER FUNCTION public.st_askml(integer, geography, integer) OWNER TO bilketa_web_user;

--
-- Name: st_askml(integer, geometry, integer); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_askml(integer, geometry, integer) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT _ST_AsKML($1, ST_Transform($2,4326), $3)$_$;


ALTER FUNCTION public.st_askml(integer, geometry, integer) OWNER TO bilketa_web_user;

--
-- Name: st_geohash(geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_geohash(geometry) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT ST_GeoHash($1, 0)$_$;


ALTER FUNCTION public.st_geohash(geometry) OWNER TO bilketa_web_user;

--
-- Name: st_length(geography); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_length(geography) RETURNS double precision
    LANGUAGE sql IMMUTABLE
    AS $_$SELECT ST_Length($1, true)$_$;


ALTER FUNCTION public.st_length(geography) OWNER TO bilketa_web_user;

--
-- Name: st_minimumboundingcircle(geometry); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION st_minimumboundingcircle(geometry) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT ST_MinimumBoundingCircle($1, 48)$_$;


ALTER FUNCTION public.st_minimumboundingcircle(geometry) OWNER TO bilketa_web_user;

--
-- Name: translate(geometry, double precision, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION translate(geometry, double precision, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT translate($1, $2, $3, 0)$_$;


ALTER FUNCTION public.translate(geometry, double precision, double precision) OWNER TO bilketa_web_user;

--
-- Name: translate(geometry, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION translate(geometry, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT affine($1, 1, 0, 0, 0, 1, 0, 0, 0, 1, $2, $3, $4)$_$;


ALTER FUNCTION public.translate(geometry, double precision, double precision, double precision) OWNER TO bilketa_web_user;

--
-- Name: transscale(geometry, double precision, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner:
--

CREATE FUNCTION transscale(geometry, double precision, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$SELECT affine($1,  $4, 0, 0,  0, $5, 0,
		0, 0, 1,  $2 * $4, $3 * $5, 0)$_$;


ALTER FUNCTION public.transscale(geometry, double precision, double precision, double precision, double precision) OWNER TO bilketa_web_user;

--
-- Name: accum(geometry); Type: AGGREGATE; Schema: public; Owner:
--

CREATE AGGREGATE accum(geometry) (
    SFUNC = public.pgis_geometry_accum_transfn,
    STYPE = pgis_abs,
    FINALFUNC = pgis_geometry_accum_finalfn
);


ALTER AGGREGATE public.accum(geometry) OWNER TO bilketa_web_user;

--
-- Name: collect(geometry); Type: AGGREGATE; Schema: public; Owner:
--

CREATE AGGREGATE collect(geometry) (
    SFUNC = public.pgis_geometry_accum_transfn,
    STYPE = pgis_abs,
    FINALFUNC = pgis_geometry_collect_finalfn
);


ALTER AGGREGATE public.collect(geometry) OWNER TO bilketa_web_user;

--
-- Name: makeline(geometry); Type: AGGREGATE; Schema: public; Owner:
--

CREATE AGGREGATE makeline(geometry) (
    SFUNC = public.pgis_geometry_accum_transfn,
    STYPE = pgis_abs,
    FINALFUNC = pgis_geometry_makeline_finalfn
);


ALTER AGGREGATE public.makeline(geometry) OWNER TO bilketa_web_user;

--
-- Name: memcollect(geometry); Type: AGGREGATE; Schema: public; Owner:
--

CREATE AGGREGATE memcollect(geometry) (
    SFUNC = public.st_collect,
    STYPE = geometry
);


ALTER AGGREGATE public.memcollect(geometry) OWNER TO bilketa_web_user;

--
-- Name: polygonize(geometry); Type: AGGREGATE; Schema: public; Owner:
--

CREATE AGGREGATE polygonize(geometry) (
    SFUNC = public.pgis_geometry_accum_transfn,
    STYPE = pgis_abs,
    FINALFUNC = pgis_geometry_polygonize_finalfn
);


ALTER AGGREGATE public.polygonize(geometry) OWNER TO bilketa_web_user;

--
-- Name: st_extent3d(geometry); Type: AGGREGATE; Schema: public; Owner:
--

CREATE AGGREGATE st_extent3d(geometry) (
    SFUNC = public.st_combine_bbox,
    STYPE = box3d
);


ALTER AGGREGATE public.st_extent3d(geometry) OWNER TO bilketa_web_user;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: Camiones; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Camiones" (
    "camionId" integer NOT NULL,
    "cuandoPosicion" timestamp without time zone,
    posicion geometry,
    matricula character varying(255) NOT NULL,
    "precision" double precision,
    "posicionAddr" character varying(100),
    "pesoNeto" double precision,
    itv character varying(140),
    otros character varying(280),
    "posicionLat" numeric(10,7),
    "posicionLng" numeric(10,7),
    "costeHora" double precision,
    CONSTRAINT enforce_dims_posicion CHECK ((st_ndims(posicion) = 2)),
    CONSTRAINT enforce_geotype_posicion CHECK (((geometrytype(posicion) = 'POINT'::text) OR (posicion IS NULL))),
    CONSTRAINT enforce_srid_posicion CHECK ((st_srid(posicion) = 4326))
);


ALTER TABLE "Camiones" OWNER TO bilketa_web_user;

--
-- Name: Camiones_camionId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Camiones_camionId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Camiones_camionId_seq" OWNER TO bilketa_web_user;

--
-- Name: Camiones_camionId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Camiones_camionId_seq" OWNED BY "Camiones"."camionId";


--
-- Name: CentrosEmergencia; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "CentrosEmergencia" (
    id integer NOT NULL,
    ip character varying(20) DEFAULT NULL::character varying,
    puerto integer,
    "puntoRecogidaId" integer NOT NULL,
    identificador character varying(255)
);


ALTER TABLE "CentrosEmergencia" OWNER TO bilketa_web_user;

--
-- Name: CentrosEmergencia_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "CentrosEmergencia_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "CentrosEmergencia_id_seq" OWNER TO bilketa_web_user;

--
-- Name: CentrosEmergencia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "CentrosEmergencia_id_seq" OWNED BY "CentrosEmergencia".id;


--
-- Name: CodigosApertura; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "CodigosApertura" (
    id integer NOT NULL,
    "fechaLlamada" timestamp without time zone DEFAULT now() NOT NULL,
    "contribuyenteId" integer NOT NULL,
    "codigoApertura" character varying(255) NOT NULL,
    "centroEmergenciaId" integer,
    "municipioId" integer,
    activado boolean DEFAULT false NOT NULL
);


ALTER TABLE "CodigosApertura" OWNER TO bilketa_web_user;

--
-- Name: CodigosAperturaPrivados; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "CodigosAperturaPrivados" (
    id integer NOT NULL,
    "codigoApertura" character varying(25) NOT NULL,
    "municipioId" integer,
    "contribuyenteId" integer,
    description character varying(250)
);


ALTER TABLE "CodigosAperturaPrivados" OWNER TO bilketa_web_user;

--
-- Name: CodigosAperturaPrivados_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "CodigosAperturaPrivados_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "CodigosAperturaPrivados_id_seq" OWNER TO bilketa_web_user;

--
-- Name: CodigosAperturaPrivados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "CodigosAperturaPrivados_id_seq" OWNED BY "CodigosAperturaPrivados".id;


--
-- Name: CodigosApertura_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "CodigosApertura_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "CodigosApertura_id_seq" OWNER TO bilketa_web_user;

--
-- Name: CodigosApertura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "CodigosApertura_id_seq" OWNED BY "CodigosApertura".id;


--
-- Name: CodigosPostales; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "CodigosPostales" (
    id integer NOT NULL,
    "codigoPostal" integer NOT NULL
);


ALTER TABLE "CodigosPostales" OWNER TO bilketa_web_user;

--
-- Name: CodigosPostales_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "CodigosPostales_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "CodigosPostales_id_seq" OWNER TO bilketa_web_user;

--
-- Name: CodigosPostales_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "CodigosPostales_id_seq" OWNED BY "CodigosPostales".id;


--
-- Name: Compostadores; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Compostadores" (
    "compostadoresId" integer NOT NULL,
    "altaFecha" timestamp without time zone NOT NULL,
    emplazamiento character varying(100) DEFAULT ''::character varying NOT NULL,
    "ventajasComunidad" boolean DEFAULT false NOT NULL,
    privado boolean DEFAULT false NOT NULL,
    "compostadoresIden" text,
    posicion geometry,
    "marcaCompostadorId" integer,
    "posicionAddr" character varying(100),
    "posicionLat" numeric(10,7),
    "posicionLng" numeric(10,7),
    CONSTRAINT enforce_dims_posicion CHECK ((st_ndims(posicion) = 2)),
    CONSTRAINT enforce_geotype_posicion CHECK (((geometrytype(posicion) = 'POINT'::text) OR (posicion IS NULL))),
    CONSTRAINT enforce_srid_posicion CHECK ((st_srid(posicion) = 25830))
);


ALTER TABLE "Compostadores" OWNER TO bilketa_web_user;

--
-- Name: CompostadoresRelContribuyentes; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "CompostadoresRelContribuyentes" (
    "idRel" integer NOT NULL,
    "compostadoresId" integer NOT NULL,
    "contribuyenteId" integer NOT NULL
);


ALTER TABLE "CompostadoresRelContribuyentes" OWNER TO bilketa_web_user;

--
-- Name: CompostadoresRelContribuyentes_idRel_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "CompostadoresRelContribuyentes_idRel_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "CompostadoresRelContribuyentes_idRel_seq" OWNER TO bilketa_web_user;

--
-- Name: CompostadoresRelContribuyentes_idRel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "CompostadoresRelContribuyentes_idRel_seq" OWNED BY "CompostadoresRelContribuyentes"."idRel";


--
-- Name: Compostadores_compostadoresId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Compostadores_compostadoresId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Compostadores_compostadoresId_seq" OWNER TO bilketa_web_user;

--
-- Name: Compostadores_compostadoresId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Compostadores_compostadoresId_seq" OWNED BY "Compostadores"."compostadoresId";


--
-- Name: Contribuyentes; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Contribuyentes" (
    "contribuyenteId" integer NOT NULL,
    "contribuyenteIden" character varying(12) NOT NULL,
    "coeficienteEntornoContribuyente" character varying(1) NOT NULL,
    "coeficienteEntornoZona" character varying(1) NOT NULL,
    "coeficienteEntornoPueblo" character varying(1) NOT NULL,
    "idContribuyenteUsoa" character varying(7) NOT NULL,
    nombre character varying(100) DEFAULT ''::character varying NOT NULL,
    "municipioId" integer,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    nif character varying(25) DEFAULT ''::character varying NOT NULL,
    cuenta character varying(500) DEFAULT ''::character varying NOT NULL,
    intuitivo character varying(500) DEFAULT ''::character varying NOT NULL,
    "codigoCalle" double precision NOT NULL,
    direccion character varying(100) DEFAULT ''::character varying NOT NULL,
    portal character varying(20) NOT NULL,
    bis character varying(20) DEFAULT ''::character varying NOT NULL,
    escalera character varying(20) DEFAULT ''::character varying NOT NULL,
    piso character varying(20) DEFAULT ''::character varying NOT NULL,
    mano character varying(20) DEFAULT ''::character varying NOT NULL,
    "otrosDomicilio" character varying(500) DEFAULT ''::character varying NOT NULL,
    tarifa character varying(10) DEFAULT ''::character varying NOT NULL,
    cantidad integer,
    "direccionFiscal" text NOT NULL,
    "portalFiscal" character varying(20) NOT NULL,
    "bisFiscal" character varying(20) DEFAULT ''::character varying NOT NULL,
    "escaleraFiscal" character varying(20) DEFAULT ''::character varying NOT NULL,
    "pisoFiscal" character varying(20) DEFAULT ''::character varying NOT NULL,
    "manoFiscal" character varying(20) DEFAULT ''::character varying NOT NULL,
    "localidadFiscal" character varying(60) DEFAULT ''::character varying NOT NULL,
    "pkFiscal" character varying(500) DEFAULT ''::character varying NOT NULL,
    "provinciaFiscal" character varying(50) DEFAULT ''::character varying NOT NULL,
    excluido boolean DEFAULT false NOT NULL,
    "posteId" integer,
    ivr character varying(2)
);


ALTER TABLE "Contribuyentes" OWNER TO bilketa_web_user;

--
-- Name: Contribuyentes_contribuyenteId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Contribuyentes_contribuyenteId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Contribuyentes_contribuyenteId_seq" OWNER TO bilketa_web_user;

--
-- Name: Contribuyentes_contribuyenteId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Contribuyentes_contribuyenteId_seq" OWNED BY "Contribuyentes"."contribuyenteId";


--
-- Name: Cubos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Cubos" (
    "cuboId" integer NOT NULL,
    "contribuyenteId" integer,
    "cubosTiposId" integer,
    "diaAsignado" character varying(13),
    "diaBaja" date,
    baja boolean DEFAULT false,
    "puntosRecogidaId" integer,
    rfid text,
    ubicacion character varying(16) DEFAULT 'poste'::character varying NOT NULL,
    "posteId" integer,
    "centrosEmergenciaId" integer
);


ALTER TABLE "Cubos" OWNER TO bilketa_web_user;

--
-- Name: CubosImportadores; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "CubosImportadores" (
    id integer NOT NULL,
    "csvFileSize" integer NOT NULL,
    "csvMimeType" character varying(80) NOT NULL,
    "csvBaseName" character varying(255) NOT NULL,
    estado character varying(20) DEFAULT 'pendiente'::character varying NOT NULL
);


ALTER TABLE "CubosImportadores" OWNER TO bilketa_web_user;

--
-- Name: CubosImportadores_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "CubosImportadores_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "CubosImportadores_id_seq" OWNER TO bilketa_web_user;

--
-- Name: CubosImportadores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "CubosImportadores_id_seq" OWNED BY "CubosImportadores".id;


--
-- Name: CubosTipos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "CubosTipos" (
    "cubosTiposId" integer NOT NULL,
    tipo character varying(500) DEFAULT ''::character varying NOT NULL,
    litros numeric(6,2),
    color character varying(100) DEFAULT ''::character varying NOT NULL,
    fabricante character varying(30) DEFAULT ''::character varying NOT NULL,
    altura numeric(6,4),
    anchura numeric(6,4),
    longitud numeric(6,4),
    llave boolean DEFAULT false NOT NULL,
    "llenadoObligatorio" boolean DEFAULT false NOT NULL,
    "marcaCuboId" integer
);


ALTER TABLE "CubosTipos" OWNER TO bilketa_web_user;

--
-- Name: CubosTipos_cubosTiposId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "CubosTipos_cubosTiposId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "CubosTipos_cubosTiposId_seq" OWNER TO bilketa_web_user;

--
-- Name: CubosTipos_cubosTiposId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "CubosTipos_cubosTiposId_seq" OWNED BY "CubosTipos"."cubosTiposId";


--
-- Name: Cubos_cuboId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Cubos_cuboId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Cubos_cuboId_seq" OWNER TO bilketa_web_user;

--
-- Name: Cubos_cuboId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Cubos_cuboId_seq" OWNED BY "Cubos"."cuboId";


--
-- Name: Descargas; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Descargas" (
    id integer NOT NULL,
    "camionId" integer,
    "puntoDescargaId" integer,
    kilos integer NOT NULL,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "Descargas" OWNER TO bilketa_web_user;

--
-- Name: Descargas_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Descargas_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Descargas_id_seq" OWNER TO bilketa_web_user;

--
-- Name: Descargas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Descargas_id_seq" OWNED BY "Descargas".id;


--
-- Name: Dispositivos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Dispositivos" (
    id integer NOT NULL,
    imei character varying(255) NOT NULL,
    "marcaDispositivoId" integer,
    "fechaCompra" date
);


ALTER TABLE "Dispositivos" OWNER TO bilketa_web_user;

--
-- Name: Dispositivos_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Dispositivos_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Dispositivos_id_seq" OWNER TO bilketa_web_user;

--
-- Name: Dispositivos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Dispositivos_id_seq" OWNED BY "Dispositivos".id;


--
-- Name: Emails; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Emails" (
    "emailId" integer NOT NULL,
    "contribuyenteId" integer,
    email character varying(255) DEFAULT ''::character varying NOT NULL,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "Emails" OWNER TO bilketa_web_user;

--
-- Name: Emails_emailId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Emails_emailId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Emails_emailId_seq" OWNER TO bilketa_web_user;

--
-- Name: Emails_emailId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Emails_emailId_seq" OWNED BY "Emails"."emailId";


--
-- Name: FileAccess; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "FileAccess" (
    id integer NOT NULL,
    "accessFileSize" integer NOT NULL,
    "accessMimeType" character varying(80) NOT NULL,
    "accessBaseName" character varying(255) NOT NULL,
    "uploadOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "FileAccess" OWNER TO bilketa_web_user;

--
-- Name: FileAccess_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "FileAccess_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "FileAccess_id_seq" OWNER TO bilketa_web_user;

--
-- Name: FileAccess_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "FileAccess_id_seq" OWNED BY "FileAccess".id;


--
-- Name: Importadores; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Importadores" (
    id integer NOT NULL,
    "archivoFileSize" integer NOT NULL,
    "archivoMimeType" character varying(80) NOT NULL,
    "archivoBaseName" character varying(255) NOT NULL,
    tipo character varying(20) NOT NULL,
    "className" character varying(20) NOT NULL,
    estado character varying(20) DEFAULT 'pendiente'::character varying NOT NULL
);


ALTER TABLE "Importadores" OWNER TO bilketa_web_user;

--
-- Name: Importadores_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Importadores_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Importadores_id_seq" OWNER TO bilketa_web_user;

--
-- Name: Importadores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Importadores_id_seq" OWNED BY "Importadores".id;


--
-- Name: Incidencias; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Incidencias" (
    "incidenciaId" integer NOT NULL,
    "fechaAlta" timestamp without time zone,
    "contribuyenteId" integer,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    "paradaId" integer,
    "cuboId" integer,
    "postesId" integer,
    "compostadorId" integer,
    "camionId" integer,
    "puntoRecogidaId" integer,
    observaciones text,
    entidad character varying(13),
    solucionada character varying(10) DEFAULT 'no'::character varying NOT NULL,
    "observacionSolucion" text,
    "tipoId" integer
);


ALTER TABLE "Incidencias" OWNER TO bilketa_web_user;

--
-- Name: Incidencias_incidenciaId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Incidencias_incidenciaId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Incidencias_incidenciaId_seq" OWNER TO bilketa_web_user;

--
-- Name: Incidencias_incidenciaId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Incidencias_incidenciaId_seq" OWNED BY "Incidencias"."incidenciaId";


--
-- Name: KlearRoles; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "KlearRoles" (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) DEFAULT ''::character varying NOT NULL,
    identifier character varying(255) NOT NULL
);


ALTER TABLE "KlearRoles" OWNER TO bilketa_web_user;

--
-- Name: KlearRolesSections; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "KlearRolesSections" (
    id integer NOT NULL,
    "klearRoleId" integer NOT NULL,
    "klearSectionId" integer NOT NULL
);


ALTER TABLE "KlearRolesSections" OWNER TO bilketa_web_user;

--
-- Name: KlearRolesSections_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "KlearRolesSections_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "KlearRolesSections_id_seq" OWNER TO bilketa_web_user;

--
-- Name: KlearRolesSections_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "KlearRolesSections_id_seq" OWNED BY "KlearRolesSections".id;


--
-- Name: KlearRoles_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "KlearRoles_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "KlearRoles_id_seq" OWNER TO bilketa_web_user;

--
-- Name: KlearRoles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "KlearRoles_id_seq" OWNED BY "KlearRoles".id;


--
-- Name: KlearSections; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "KlearSections" (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) DEFAULT ''::character varying NOT NULL,
    identifier character varying(255) NOT NULL
);


ALTER TABLE "KlearSections" OWNER TO bilketa_web_user;

--
-- Name: KlearSections_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "KlearSections_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "KlearSections_id_seq" OWNER TO bilketa_web_user;

--
-- Name: KlearSections_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "KlearSections_id_seq" OWNED BY "KlearSections".id;


--
-- Name: KlearUsers; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "KlearUsers" (
    "userId" integer NOT NULL,
    login character varying(40) NOT NULL,
    email character varying(255) NOT NULL,
    pass character varying(80) NOT NULL,
    active smallint DEFAULT 1,
    "createdOn" timestamp without time zone,
    "updateOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "KlearUsers" OWNER TO bilketa_web_user;

--
-- Name: KlearUsersRoles; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "KlearUsersRoles" (
    id integer NOT NULL,
    "klearUserId" integer NOT NULL,
    "klearRoleId" integer NOT NULL
);


ALTER TABLE "KlearUsersRoles" OWNER TO bilketa_web_user;

--
-- Name: KlearUsersRoles_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "KlearUsersRoles_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "KlearUsersRoles_id_seq" OWNER TO bilketa_web_user;

--
-- Name: KlearUsersRoles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "KlearUsersRoles_id_seq" OWNED BY "KlearUsersRoles".id;


--
-- Name: KlearUsers_userId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "KlearUsers_userId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "KlearUsers_userId_seq" OWNER TO bilketa_web_user;

--
-- Name: KlearUsers_userId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "KlearUsers_userId_seq" OWNED BY "KlearUsers"."userId";


--
-- Name: Locuciones; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Locuciones" (
    id integer NOT NULL,
    iden character varying(255) NOT NULL,
    descripcion text,
    "esLocFileSize" integer,
    "esLocMimeType" character varying(80) DEFAULT NULL::character varying,
    "esLocBaseName" character varying(255) DEFAULT NULL::character varying,
    "euLocFileSize" integer,
    "euLocMimeType" character varying(80) DEFAULT NULL::character varying,
    "euLocBaseName" character varying(255) DEFAULT NULL::character varying,
    "esLocCodificadoFileSize" integer,
    "esLocCodificadoMimeType" character varying(80) DEFAULT NULL::character varying,
    "esLocCodificadoBaseName" character varying(255) DEFAULT NULL::character varying,
    "euLocCodificadoFileSize" integer,
    "euLocCodificadoMimeType" character varying(80) DEFAULT NULL::character varying,
    "euLocCodificadoBaseName" character varying(255) DEFAULT NULL::character varying,
    estado character varying(8) DEFAULT 'pending'::character varying NOT NULL
);


ALTER TABLE "Locuciones" OWNER TO bilketa_web_user;

--
-- Name: Locuciones_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Locuciones_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Locuciones_id_seq" OWNER TO bilketa_web_user;

--
-- Name: Locuciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Locuciones_id_seq" OWNED BY "Locuciones".id;


--
-- Name: LogEmails_emailMensajeId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "LogEmails_emailMensajeId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "LogEmails_emailMensajeId_seq" OWNER TO bilketa_web_user;

--
-- Name: LogEmails; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "LogEmails" (
    "emailMensajeId" integer DEFAULT nextval('"LogEmails_emailMensajeId_seq"'::regclass) NOT NULL,
    mensaje text,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    asunto character varying(255) NOT NULL,
    email character varying(255) DEFAULT ''::character varying NOT NULL,
    "incidenciaId" integer NOT NULL
);


ALTER TABLE "LogEmails" OWNER TO bilketa_web_user;

--
-- Name: LogLlamadas; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "LogLlamadas" (
    "llamadasId" integer NOT NULL,
    "incidenciaId" integer,
    dia date NOT NULL,
    hora time without time zone NOT NULL,
    contactado boolean DEFAULT false NOT NULL,
    "plantillasTelefonoId" integer,
    telefono character varying(25) DEFAULT ''::character varying NOT NULL
);


ALTER TABLE "LogLlamadas" OWNER TO bilketa_web_user;

--
-- Name: LogLlamadas_llamadasId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "LogLlamadas_llamadasId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "LogLlamadas_llamadasId_seq" OWNER TO bilketa_web_user;

--
-- Name: LogLlamadas_llamadasId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "LogLlamadas_llamadasId_seq" OWNED BY "LogLlamadas"."llamadasId";


--
-- Name: LogSms_smsMensajeId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "LogSms_smsMensajeId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "LogSms_smsMensajeId_seq" OWNER TO bilketa_web_user;

--
-- Name: LogSms; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "LogSms" (
    "smsMensajeId" integer DEFAULT nextval('"LogSms_smsMensajeId_seq"'::regclass) NOT NULL,
    mensaje text,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    "incidenciaId" integer,
    telefono character varying(25) DEFAULT ''::character varying NOT NULL,
    "plantillasSmsId" integer
);


ALTER TABLE "LogSms" OWNER TO bilketa_web_user;

--
-- Name: MarcasCompostador; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "MarcasCompostador" (
    id integer NOT NULL,
    marca character varying(255) NOT NULL,
    tipo character varying(255) DEFAULT NULL::character varying,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "MarcasCompostador" OWNER TO bilketa_web_user;

--
-- Name: MarcasCompostador_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "MarcasCompostador_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "MarcasCompostador_id_seq" OWNER TO bilketa_web_user;

--
-- Name: MarcasCompostador_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "MarcasCompostador_id_seq" OWNED BY "MarcasCompostador".id;


--
-- Name: MarcasCubo; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "MarcasCubo" (
    id integer NOT NULL,
    marca character varying(255) NOT NULL,
    tipo character varying(255) DEFAULT NULL::character varying,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "MarcasCubo" OWNER TO bilketa_web_user;

--
-- Name: MarcasCubo_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "MarcasCubo_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "MarcasCubo_id_seq" OWNER TO bilketa_web_user;

--
-- Name: MarcasCubo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "MarcasCubo_id_seq" OWNED BY "MarcasCubo".id;


--
-- Name: MarcasDispositivo; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "MarcasDispositivo" (
    id integer NOT NULL,
    marca character varying(255) NOT NULL,
    tipo character varying(255) DEFAULT NULL::character varying,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "MarcasDispositivo" OWNER TO bilketa_web_user;

--
-- Name: MarcasDispositivo_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "MarcasDispositivo_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "MarcasDispositivo_id_seq" OWNER TO bilketa_web_user;

--
-- Name: MarcasDispositivo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "MarcasDispositivo_id_seq" OWNED BY "MarcasDispositivo".id;


--
-- Name: MarcasPoste; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "MarcasPoste" (
    id integer NOT NULL,
    marca character varying(255) NOT NULL,
    tipo character varying(255) DEFAULT NULL::character varying,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "MarcasPoste" OWNER TO bilketa_web_user;

--
-- Name: MarcasPoste_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "MarcasPoste_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "MarcasPoste_id_seq" OWNER TO bilketa_web_user;

--
-- Name: MarcasPoste_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "MarcasPoste_id_seq" OWNED BY "MarcasPoste".id;


--
-- Name: Municipios; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Municipios" (
    "municipioId" integer NOT NULL,
    municipio character varying(50) NOT NULL,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    "esLocFileSize" integer,
    "esLocMimeType" character varying(80) DEFAULT NULL::character varying,
    "esLocBaseName" character varying(255) DEFAULT NULL::character varying,
    "euLocFileSize" integer,
    "euLocMimeType" character varying(80) DEFAULT NULL::character varying,
    "euLocBaseName" character varying(255) DEFAULT NULL::character varying,
    "esLocCodificadoFileSize" integer,
    "esLocCodificadoMimeType" character varying(80) DEFAULT NULL::character varying,
    "esLocCodificadoBaseName" character varying(255) DEFAULT NULL::character varying,
    "euLocCodificadoFileSize" integer,
    "euLocCodificadoMimeType" character varying(80) DEFAULT NULL::character varying,
    "euLocCodificadoBaseName" character varying(255) DEFAULT NULL::character varying,
    estado character varying(8) DEFAULT 'pending'::character varying NOT NULL
);


ALTER TABLE "Municipios" OWNER TO bilketa_web_user;

--
-- Name: MunicipiosRelCercania; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "MunicipiosRelCercania" (
    id integer NOT NULL,
    "municipioId" integer,
    "municipioCercanoId" integer
);


ALTER TABLE "MunicipiosRelCercania" OWNER TO bilketa_web_user;

--
-- Name: MunicipiosRelCercania_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "MunicipiosRelCercania_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "MunicipiosRelCercania_id_seq" OWNER TO bilketa_web_user;

--
-- Name: MunicipiosRelCercania_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "MunicipiosRelCercania_id_seq" OWNED BY "MunicipiosRelCercania".id;


--
-- Name: MunicipiosRelCodigosPostales; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "MunicipiosRelCodigosPostales" (
    id integer NOT NULL,
    "municipioId" integer NOT NULL,
    "codigoPostalId" integer
);


ALTER TABLE "MunicipiosRelCodigosPostales" OWNER TO bilketa_web_user;

--
-- Name: MunicipiosRelCodigosPostales_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "MunicipiosRelCodigosPostales_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "MunicipiosRelCodigosPostales_id_seq" OWNER TO bilketa_web_user;

--
-- Name: MunicipiosRelCodigosPostales_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "MunicipiosRelCodigosPostales_id_seq" OWNED BY "MunicipiosRelCodigosPostales".id;


--
-- Name: Municipios_municipioId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Municipios_municipioId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Municipios_municipioId_seq" OWNER TO bilketa_web_user;

--
-- Name: Municipios_municipioId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Municipios_municipioId_seq" OWNED BY "Municipios"."municipioId";


--
-- Name: Operarios; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Operarios" (
    "operarioId" integer NOT NULL,
    nombre character varying(30) NOT NULL,
    "rolId" integer
);


ALTER TABLE "Operarios" OWNER TO bilketa_web_user;

--
-- Name: Operarios_operarioId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Operarios_operarioId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Operarios_operarioId_seq" OWNER TO bilketa_web_user;

--
-- Name: Operarios_operarioId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Operarios_operarioId_seq" OWNED BY "Operarios"."operarioId";


--
-- Name: Paradas; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Paradas" (
    "paradaId" integer NOT NULL,
    "turnosCamionesId" integer,
    finalizado boolean DEFAULT false NOT NULL,
    "puntosRecogidasId" integer,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    "horaInicio" time without time zone NOT NULL,
    "horaFinal" time without time zone
);


ALTER TABLE "Paradas" OWNER TO bilketa_web_user;

--
-- Name: Paradas_paradaId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Paradas_paradaId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Paradas_paradaId_seq" OWNER TO bilketa_web_user;

--
-- Name: Paradas_paradaId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Paradas_paradaId_seq" OWNED BY "Paradas"."paradaId";


--
-- Name: PlantillasEmail; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "PlantillasEmail" (
    id integer NOT NULL,
    asunto character varying(255) NOT NULL,
    mensaje text,
    asunto_eu character varying(255) NOT NULL,
    mensaje_es text,
    mensaje_eu text
);


ALTER TABLE "PlantillasEmail" OWNER TO bilketa_web_user;

--
-- Name: PlantillasEmail_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "PlantillasEmail_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "PlantillasEmail_id_seq" OWNER TO bilketa_web_user;

--
-- Name: PlantillasEmail_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "PlantillasEmail_id_seq" OWNED BY "PlantillasEmail".id;


--
-- Name: PlantillasSms; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "PlantillasSms" (
    id integer NOT NULL,
    asunto character varying(255),
    mensaje text,
    mensaje_es text,
    mensaje_eu text,
    asunto_es character varying(255) NOT NULL,
    asunto_eu character varying(255) NOT NULL
);


ALTER TABLE "PlantillasSms" OWNER TO bilketa_web_user;

--
-- Name: PlantillasSms_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "PlantillasSms_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "PlantillasSms_id_seq" OWNER TO bilketa_web_user;

--
-- Name: PlantillasSms_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "PlantillasSms_id_seq" OWNED BY "PlantillasSms".id;


--
-- Name: PlantillasTelefono; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "PlantillasTelefono" (
    id integer NOT NULL,
    asunto character varying(255) NOT NULL,
    "esLocFileSize" integer,
    "esLocMimeType" character varying(80) DEFAULT NULL::character varying,
    "esLocBaseName" character varying(255) DEFAULT NULL::character varying,
    "euLocFileSize" integer,
    "euLocMimeType" character varying(80) DEFAULT NULL::character varying,
    "euLocBaseName" character varying(255) DEFAULT NULL::character varying,
    "esLocCodificadoFileSize" integer,
    "esLocCodificadoMimeType" character varying(80) DEFAULT NULL::character varying,
    "esLocCodificadoBaseName" character varying(255) DEFAULT NULL::character varying,
    "euLocCodificadoFileSize" integer,
    "euLocCodificadoMimeType" character varying(80) DEFAULT NULL::character varying,
    "euLocCodificadoBaseName" character varying(255) DEFAULT NULL::character varying,
    estado character varying(255) DEFAULT 'pending'::character varying NOT NULL
);


ALTER TABLE "PlantillasTelefono" OWNER TO bilketa_web_user;

--
-- Name: PlantillasTelefono_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "PlantillasTelefono_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "PlantillasTelefono_id_seq" OWNER TO bilketa_web_user;

--
-- Name: PlantillasTelefono_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "PlantillasTelefono_id_seq" OWNED BY "PlantillasTelefono".id;


--
-- Name: Posicionamiento; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Posicionamiento" (
    "posicionamientoId" integer NOT NULL,
    "turnosCamionesId" integer,
    "precision" character varying(255) DEFAULT NULL::character varying,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    fecha timestamp without time zone NOT NULL,
    posicion double precision,
    "posicionAddr" character varying(100),
    "posicionLng" numeric(10,7)
);


ALTER TABLE "Posicionamiento" OWNER TO bilketa_web_user;

--
-- Name: Posicionamiento_posicionamientoId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Posicionamiento_posicionamientoId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Posicionamiento_posicionamientoId_seq" OWNER TO bilketa_web_user;

--
-- Name: Posicionamiento_posicionamientoId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Posicionamiento_posicionamientoId_seq" OWNED BY "Posicionamiento"."posicionamientoId";


--
-- Name: Postes; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Postes" (
    "postesId" integer NOT NULL,
    "puntosRecogidaId" integer,
    "postesTiposId" integer,
    "fechaColocacion" timestamp without time zone,
    baja boolean DEFAULT false NOT NULL,
    "fechaBaja" timestamp without time zone,
    "postesIden" character varying(50) NOT NULL
);


ALTER TABLE "Postes" OWNER TO bilketa_web_user;

--
-- Name: PostesTipos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "PostesTipos" (
    "postesTiposId" integer NOT NULL,
    columna text NOT NULL,
    capacidad integer DEFAULT 0 NOT NULL,
    caras integer DEFAULT 0 NOT NULL,
    "marcaPosteId" integer
);


ALTER TABLE "PostesTipos" OWNER TO bilketa_web_user;

--
-- Name: PostesTipos_postesTiposId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "PostesTipos_postesTiposId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "PostesTipos_postesTiposId_seq" OWNER TO bilketa_web_user;

--
-- Name: PostesTipos_postesTiposId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "PostesTipos_postesTiposId_seq" OWNED BY "PostesTipos"."postesTiposId";


--
-- Name: Postes_postesId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Postes_postesId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Postes_postesId_seq" OWNER TO bilketa_web_user;

--
-- Name: Postes_postesId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Postes_postesId_seq" OWNED BY "Postes"."postesId";


--
-- Name: PuntosDescarga; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "PuntosDescarga" (
    "puntosDescargaId" integer NOT NULL,
    "puntosDescargaIden" character varying(7) NOT NULL,
    "residuosTiposId" integer,
    nombre character varying(100) DEFAULT ''::character varying NOT NULL,
    descripcion text NOT NULL,
    posicion geometry,
    "posicionAddr" character varying(100),
    "posicionLat" numeric(10,7),
    "posicionLng" numeric(10,7),
    CONSTRAINT enforce_dims_posicion CHECK ((st_ndims(posicion) = 2)),
    CONSTRAINT enforce_geotype_posicion CHECK (((geometrytype(posicion) = 'POINT'::text) OR (posicion IS NULL))),
    CONSTRAINT enforce_srid_posicion CHECK ((st_srid(posicion) = 25830))
);


ALTER TABLE "PuntosDescarga" OWNER TO bilketa_web_user;

--
-- Name: PuntosDescarga_puntosDescargaId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "PuntosDescarga_puntosDescargaId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "PuntosDescarga_puntosDescargaId_seq" OWNER TO bilketa_web_user;

--
-- Name: PuntosDescarga_puntosDescargaId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "PuntosDescarga_puntosDescargaId_seq" OWNED BY "PuntosDescarga"."puntosDescargaId";


--
-- Name: PuntosRecogida; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "PuntosRecogida" (
    "puntosRecogidaId" integer NOT NULL,
    "puntosRecogidaTiposId" integer,
    "nombreDescriptivo" character varying(100) DEFAULT ''::character varying NOT NULL,
    "municipioId" integer DEFAULT NULL::smallint,
    barrio character varying(50) DEFAULT ''::character varying NOT NULL,
    posicion geometry,
    rfid character varying(255) DEFAULT NULL::character varying,
    "posicionAddr" character varying(100),
    "posicionLat" numeric(10,7),
    "posicionLng" numeric(10,7),
    numero character varying(10) DEFAULT ''::character varying NOT NULL,
    calle character varying(50) DEFAULT ''::character varying NOT NULL,
    CONSTRAINT enforce_dims_posicion CHECK ((st_ndims(posicion) = 2)),
    CONSTRAINT enforce_geotype_posicion CHECK (((geometrytype(posicion) = 'POINT'::text) OR (posicion IS NULL))),
    CONSTRAINT enforce_srid_posicion CHECK ((st_srid(posicion) = 25830))
);


ALTER TABLE "PuntosRecogida" OWNER TO bilketa_web_user;

--
-- Name: PuntosRecogidaTipos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "PuntosRecogidaTipos" (
    "puntosRecogidaTiposId" integer NOT NULL,
    descripcion text,
    nombre character varying(255) NOT NULL
);


ALTER TABLE "PuntosRecogidaTipos" OWNER TO bilketa_web_user;

--
-- Name: PuntosRecogidaTipos_puntosRecogidaTiposId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "PuntosRecogidaTipos_puntosRecogidaTiposId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "PuntosRecogidaTipos_puntosRecogidaTiposId_seq" OWNER TO bilketa_web_user;

--
-- Name: PuntosRecogidaTipos_puntosRecogidaTiposId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "PuntosRecogidaTipos_puntosRecogidaTiposId_seq" OWNED BY "PuntosRecogidaTipos"."puntosRecogidaTiposId";


--
-- Name: PuntosRecogida_puntosRecogidaId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "PuntosRecogida_puntosRecogidaId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "PuntosRecogida_puntosRecogidaId_seq" OWNER TO bilketa_web_user;

--
-- Name: PuntosRecogida_puntosRecogidaId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "PuntosRecogida_puntosRecogidaId_seq" OWNED BY "PuntosRecogida"."puntosRecogidaId";


--
-- Name: RecogidaTipos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "RecogidaTipos" (
    "recogidaTiposId" integer NOT NULL,
    descripcion text,
    nombre character varying(255) NOT NULL
);


ALTER TABLE "RecogidaTipos" OWNER TO bilketa_web_user;

--
-- Name: RecogidaTipos_recogidaTiposId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "RecogidaTipos_recogidaTiposId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "RecogidaTipos_recogidaTiposId_seq" OWNER TO bilketa_web_user;

--
-- Name: RecogidaTipos_recogidaTiposId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "RecogidaTipos_recogidaTiposId_seq" OWNED BY "RecogidaTipos"."recogidaTiposId";


--
-- Name: Recogidas; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Recogidas" (
    id integer NOT NULL,
    "recogidaTipoId" integer NOT NULL,
    "cuboId" integer NOT NULL,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL,
    "paradaId" integer,
    "posteId" integer,
    "gradoLlenado" integer,
    "centroEmergenciaId" integer,
    "puntoRecogidaId" integer,
    tipos character varying(16) NOT NULL
);


ALTER TABLE "Recogidas" OWNER TO bilketa_web_user;

--
-- Name: Recogidas_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Recogidas_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Recogidas_id_seq" OWNER TO bilketa_web_user;

--
-- Name: Recogidas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Recogidas_id_seq" OWNED BY "Recogidas".id;


--
-- Name: ResiduosTipos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "ResiduosTipos" (
    "residuosTiposId" integer NOT NULL,
    descripcion text,
    nombre character varying(255) NOT NULL
);


ALTER TABLE "ResiduosTipos" OWNER TO bilketa_web_user;

--
-- Name: ResiduosTipos_residuosTiposId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "ResiduosTipos_residuosTiposId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "ResiduosTipos_residuosTiposId_seq" OWNER TO bilketa_web_user;

--
-- Name: ResiduosTipos_residuosTiposId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "ResiduosTipos_residuosTiposId_seq" OWNED BY "ResiduosTipos"."residuosTiposId";


--
-- Name: Revision; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Revision" (
    "revisionId" integer NOT NULL,
    "compostadoresId" integer NOT NULL,
    "fechaHora" timestamp without time zone NOT NULL,
    "operadorId" integer,
    observaciones text,
    "revisionTipoId" integer
);


ALTER TABLE "Revision" OWNER TO bilketa_web_user;

--
-- Name: RevisionTipos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "RevisionTipos" (
    id integer NOT NULL,
    tipo character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE "RevisionTipos" OWNER TO bilketa_web_user;

--
-- Name: RevisionTipos_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "RevisionTipos_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "RevisionTipos_id_seq" OWNER TO bilketa_web_user;

--
-- Name: RevisionTipos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "RevisionTipos_id_seq" OWNED BY "RevisionTipos".id;


--
-- Name: Revision_revisionId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Revision_revisionId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Revision_revisionId_seq" OWNER TO bilketa_web_user;

--
-- Name: Revision_revisionId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Revision_revisionId_seq" OWNED BY "Revision"."revisionId";


--
-- Name: Roles; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Roles" (
    id integer NOT NULL,
    rol character varying(255) NOT NULL,
    descripcion text,
    "costeHora" double precision DEFAULT 0 NOT NULL
);


ALTER TABLE "Roles" OWNER TO bilketa_web_user;

--
-- Name: Roles_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Roles_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Roles_id_seq" OWNER TO bilketa_web_user;

--
-- Name: Roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Roles_id_seq" OWNED BY "Roles".id;


--
-- Name: Rutas; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Rutas" (
    "rutaId" integer NOT NULL,
    "rutasTiposId" integer,
    "tiempoAprox" time without time zone,
    "puntosDescargaId" integer,
    "residuosTiposId" integer,
    identificacion character varying(255) NOT NULL
);


ALTER TABLE "Rutas" OWNER TO bilketa_web_user;

--
-- Name: RutasRelPuntosRecogida; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "RutasRelPuntosRecogida" (
    id integer NOT NULL,
    "rutaId" integer NOT NULL,
    "puntosRecogidaId" integer NOT NULL,
    orden smallint
);


ALTER TABLE "RutasRelPuntosRecogida" OWNER TO bilketa_web_user;

--
-- Name: RutasRelPuntosRecogida_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "RutasRelPuntosRecogida_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "RutasRelPuntosRecogida_id_seq" OWNER TO bilketa_web_user;

--
-- Name: RutasRelPuntosRecogida_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "RutasRelPuntosRecogida_id_seq" OWNED BY "RutasRelPuntosRecogida".id;


--
-- Name: RutasTipos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "RutasTipos" (
    "rutasTiposId" integer NOT NULL,
    descripcion text,
    nombre character varying(200) NOT NULL
);


ALTER TABLE "RutasTipos" OWNER TO bilketa_web_user;

--
-- Name: RutasTipos_rutasTiposId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "RutasTipos_rutasTiposId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "RutasTipos_rutasTiposId_seq" OWNER TO bilketa_web_user;

--
-- Name: RutasTipos_rutasTiposId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "RutasTipos_rutasTiposId_seq" OWNED BY "RutasTipos"."rutasTiposId";


--
-- Name: Rutas_rutaId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Rutas_rutaId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Rutas_rutaId_seq" OWNER TO bilketa_web_user;

--
-- Name: Rutas_rutaId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Rutas_rutaId_seq" OWNED BY "Rutas"."rutaId";


--
-- Name: Telefonos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Telefonos" (
    "telefonoId" integer NOT NULL,
    "contribuyenteId" integer,
    telefono character varying(25) NOT NULL,
    tipo character varying(5) DEFAULT 'movil'::character varying NOT NULL,
    "createdOn" timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "Telefonos" OWNER TO bilketa_web_user;

--
-- Name: Telefonos_telefonoId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Telefonos_telefonoId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Telefonos_telefonoId_seq" OWNER TO bilketa_web_user;

--
-- Name: Telefonos_telefonoId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Telefonos_telefonoId_seq" OWNED BY "Telefonos"."telefonoId";


--
-- Name: TiposIncidencias; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "TiposIncidencias" (
    "tipoId" integer NOT NULL,
    descripcion text,
    gravedad character varying(9) DEFAULT 'moderada'::character varying NOT NULL,
    tipo character varying(13),
    "resolucionAutomatica" boolean DEFAULT false NOT NULL,
    "plantillasEmailId" integer,
    "plantillasEmailPrioridad" integer DEFAULT 1,
    "plantillasSmsId" integer,
    "plantillasSmsPrioridad" integer DEFAULT 1,
    "plantillasTelefonoId" integer,
    "plantillasTelefonoPrioridad" integer DEFAULT 1
);


ALTER TABLE "TiposIncidencias" OWNER TO bilketa_web_user;

--
-- Name: TiposIncidencias_tipoId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "TiposIncidencias_tipoId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "TiposIncidencias_tipoId_seq" OWNER TO bilketa_web_user;

--
-- Name: TiposIncidencias_tipoId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "TiposIncidencias_tipoId_seq" OWNED BY "TiposIncidencias"."tipoId";


--
-- Name: Turnos; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "Turnos" (
    "turnoId" integer NOT NULL,
    "rutaId" integer,
    fecha date NOT NULL,
    "horaInicio" time without time zone NOT NULL,
    "horaFinal" time without time zone
);


ALTER TABLE "Turnos" OWNER TO bilketa_web_user;

--
-- Name: TurnosCamionesRelOperarios; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "TurnosCamionesRelOperarios" (
    id integer NOT NULL,
    "turnosRelCamionesId" integer,
    "operarioId" integer
);


ALTER TABLE "TurnosCamionesRelOperarios" OWNER TO bilketa_web_user;

--
-- Name: TurnosCamionesRelOperarios_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "TurnosCamionesRelOperarios_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "TurnosCamionesRelOperarios_id_seq" OWNER TO bilketa_web_user;

--
-- Name: TurnosCamionesRelOperarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "TurnosCamionesRelOperarios_id_seq" OWNED BY "TurnosCamionesRelOperarios".id;


--
-- Name: TurnosRelCamiones; Type: TABLE; Schema: public; Owner:
--

CREATE TABLE "TurnosRelCamiones" (
    id integer NOT NULL,
    "turnoId" integer,
    "camionesId" integer,
    orden character varying(4) DEFAULT 'asc'::character varying NOT NULL,
    "origenPuntoRecogidaId" integer,
    "tabletId" integer
);


ALTER TABLE "TurnosRelCamiones" OWNER TO bilketa_web_user;

--
-- Name: TurnosRelCamiones_id_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "TurnosRelCamiones_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "TurnosRelCamiones_id_seq" OWNER TO bilketa_web_user;

--
-- Name: TurnosRelCamiones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "TurnosRelCamiones_id_seq" OWNED BY "TurnosRelCamiones".id;


--
-- Name: Turnos_turnoId_seq; Type: SEQUENCE; Schema: public; Owner:
--

CREATE SEQUENCE "Turnos_turnoId_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Turnos_turnoId_seq" OWNER TO bilketa_web_user;

--
-- Name: Turnos_turnoId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner:
--

ALTER SEQUENCE "Turnos_turnoId_seq" OWNED BY "Turnos"."turnoId";


--
-- Name: compostadoresdetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW compostadoresdetalle AS
 SELECT "Compostadores"."compostadoresId",
    "Compostadores"."altaFecha",
    "Compostadores".emplazamiento,
    "Compostadores"."ventajasComunidad",
    "Compostadores".privado,
    "Compostadores"."compostadoresIden",
    "Compostadores".posicion,
    "Compostadores"."marcaCompostadorId",
    "MarcasCompostador".marca,
    "MarcasCompostador".tipo
   FROM ("Compostadores"
     JOIN "MarcasCompostador" ON (("Compostadores"."marcaCompostadorId" = "MarcasCompostador".id)));


ALTER TABLE compostadoresdetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW compostadoresdetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW compostadoresdetalle IS 'Vista que muestra los datos detallados de los compostadores (textos de tablas realacionadas)';


--
-- Name: cubodetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW cubodetalle AS
 SELECT "Cubos"."cuboId",
    "Cubos"."contribuyenteId",
    "Cubos"."cubosTiposId",
    "Cubos"."diaAsignado",
    "Cubos"."diaBaja",
    "Cubos".baja,
    "Cubos"."puntosRecogidaId",
    "Cubos".rfid,
    "Cubos".ubicacion,
    "Cubos"."posteId",
    "Cubos"."centrosEmergenciaId",
    "CubosTipos".tipo,
    "CubosTipos".litros,
    "CubosTipos".color,
    "CubosTipos".fabricante,
    "CubosTipos".altura,
    "CubosTipos".anchura,
    "CubosTipos".longitud,
    "CubosTipos".llave,
    "CubosTipos"."llenadoObligatorio",
    "CubosTipos"."marcaCuboId",
    "MarcasCubo".marca,
    "MarcasCubo".tipo AS "tipoMarcaCubo",
    "Contribuyentes".nombre AS "nombreContributyente",
    "Contribuyentes".nif AS "nifContributyente"
   FROM ((("Cubos"
     JOIN "CubosTipos" ON (("Cubos"."cubosTiposId" = "CubosTipos"."cubosTiposId")))
     JOIN "MarcasCubo" ON (("CubosTipos"."marcaCuboId" = "MarcasCubo".id)))
     LEFT JOIN "Contribuyentes" ON (("Cubos"."contribuyenteId" = "Contribuyentes"."contribuyenteId")));


ALTER TABLE cubodetalle OWNER TO bilketa_web_user;

--
-- Name: operariodetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW operariodetalle AS
 SELECT "Operarios"."operarioId",
    "Operarios".nombre,
    "Operarios"."rolId",
    "Roles".id,
    "Roles".rol,
    "Roles".descripcion
   FROM ("Operarios"
     JOIN "Roles" ON (("Operarios"."rolId" = "Roles".id)));


ALTER TABLE operariodetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW operariodetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW operariodetalle IS 'Vista que muestra los operarios en detalle (textos de tablas realacionadas)';


--
-- Name: rutasdetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW rutasdetalle AS
 SELECT "Rutas"."rutaId",
    "Rutas"."rutasTiposId",
    "Rutas"."tiempoAprox",
    "Rutas"."puntosDescargaId",
    "Rutas"."residuosTiposId",
    "Rutas".identificacion,
    "RutasTipos".descripcion AS "rutaTipoDescripcion",
    "RutasTipos".nombre AS "rutaTipoNombre",
    "ResiduosTipos".descripcion AS "residuosTipoDescripcion",
    "ResiduosTipos".nombre AS "residuosTipoNombre"
   FROM (("Rutas"
     JOIN "ResiduosTipos" ON (("Rutas"."residuosTiposId" = "ResiduosTipos"."residuosTiposId")))
     JOIN "RutasTipos" ON (("Rutas"."rutasTiposId" = "RutasTipos"."rutasTiposId")));


ALTER TABLE rutasdetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW rutasdetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW rutasdetalle IS 'Vista que muestra las rutas con datos detallados (textos de tablas realacionadas)';


--
-- Name: posicionamientodetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW posicionamientodetalle AS
 SELECT "Posicionamiento"."posicionamientoId",
    "Posicionamiento"."precision",
    "Posicionamiento".fecha AS "fechaPosicion",
    "Posicionamiento".posicion,
    "Camiones"."camionId",
    "Camiones".matricula,
    "Turnos"."turnoId",
    "Turnos".fecha AS "fechaTurno",
    "Turnos"."horaInicio" AS "horaInicioTurno",
    "Turnos"."horaFinal" AS "horaFinalTurno",
    rutasdetalle."rutaId",
    rutasdetalle."rutasTiposId",
    rutasdetalle."tiempoAprox",
    rutasdetalle."puntosDescargaId",
    rutasdetalle."residuosTiposId",
    rutasdetalle.identificacion,
    rutasdetalle."rutaTipoDescripcion",
    rutasdetalle."rutaTipoNombre",
    rutasdetalle."residuosTipoDescripcion",
    rutasdetalle."residuosTipoNombre",
    (("Turnos".fecha || ' - '::text) || (rutasdetalle.identificacion)::text) AS "descripcionTurno"
   FROM (((("TurnosRelCamiones"
     JOIN "Turnos" ON (("TurnosRelCamiones"."turnoId" = "Turnos"."turnoId")))
     JOIN rutasdetalle ON (("Turnos"."rutaId" = rutasdetalle."rutaId")))
     JOIN "Camiones" ON (("TurnosRelCamiones"."camionesId" = "Camiones"."camionId")))
     JOIN "Posicionamiento" ON (("TurnosRelCamiones".id = "Posicionamiento"."turnosCamionesId")));


ALTER TABLE posicionamientodetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW posicionamientodetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW posicionamientodetalle IS 'Vista que muestra los datos detallados de las posiciones de los vehículos (textos de tablas realacionadas)';


--
-- Name: postedetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW postedetalle AS
 SELECT "Postes"."postesId",
    "Postes"."puntosRecogidaId",
    "Postes"."postesTiposId",
    "Postes"."fechaColocacion",
    "Postes".baja,
    "Postes"."fechaBaja",
    "Postes"."postesIden",
    "PostesTipos".columna,
    "PostesTipos".capacidad,
    "PostesTipos".caras,
    "PostesTipos"."marcaPosteId",
    "MarcasPoste".marca,
    "MarcasPoste".tipo
   FROM (("Postes"
     JOIN "PostesTipos" ON (("Postes"."postesTiposId" = "PostesTipos"."postesTiposId")))
     JOIN "MarcasPoste" ON (("PostesTipos"."marcaPosteId" = "MarcasPoste".id)));


ALTER TABLE postedetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW postedetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW postedetalle IS 'Vista que muestra los datos detallados de los postes (textos de tablas realacionadas)';


--
-- Name: puntosdescargadetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW puntosdescargadetalle AS
 SELECT "PuntosDescarga"."puntosDescargaId",
    "PuntosDescarga"."puntosDescargaIden",
    "PuntosDescarga"."residuosTiposId",
    "PuntosDescarga".nombre,
    "PuntosDescarga".descripcion,
    "PuntosDescarga".posicion,
    "ResiduosTipos".descripcion AS "residuosTipoDescripcion",
    "ResiduosTipos".nombre AS "residuosTipoNombre"
   FROM ("PuntosDescarga"
     JOIN "ResiduosTipos" ON (("PuntosDescarga"."residuosTiposId" = "ResiduosTipos"."residuosTiposId")));


ALTER TABLE puntosdescargadetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW puntosdescargadetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW puntosdescargadetalle IS 'Vista que muestra los puntos de descarga con datos detallados (textos de tablas realacionadas)';


--
-- Name: puntosrecogidadetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW puntosrecogidadetalle AS
 SELECT "PuntosRecogida"."puntosRecogidaId",
    "PuntosRecogida"."puntosRecogidaTiposId",
    "PuntosRecogida".posicion,
    "PuntosRecogida"."nombreDescriptivo",
    "Municipios".municipio,
    "PuntosRecogida"."municipioId",
    "PuntosRecogida".barrio,
    "PuntosRecogidaTipos".nombre AS "tipoRecogidaNombre",
    "PuntosRecogidaTipos".descripcion AS "tipoRecogidaDescripcion",
    "PuntosRecogida".rfid
   FROM (("PuntosRecogida"
     JOIN "PuntosRecogidaTipos" ON (("PuntosRecogida"."puntosRecogidaTiposId" = "PuntosRecogidaTipos"."puntosRecogidaTiposId")))
     JOIN "Municipios" ON (("PuntosRecogida"."municipioId" = "Municipios"."municipioId")));


ALTER TABLE puntosrecogidadetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW puntosrecogidadetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW puntosrecogidadetalle IS 'Vista que muestra los puntos de recogida con datos detallados (textos de tablas realacionadas)';


--
-- Name: puntosrecogidadetalleruta; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW puntosrecogidadetalleruta AS
 SELECT "RutasRelPuntosRecogida"."rutaId",
    "PuntosRecogida"."puntosRecogidaId",
    "RutasRelPuntosRecogida".orden,
    "PuntosRecogida".posicion,
    "PuntosRecogida"."nombreDescriptivo",
    "Municipios".municipio,
    "PuntosRecogida".barrio,
    "PuntosRecogida"."municipioId",
    "PuntosRecogida"."puntosRecogidaTiposId",
    "PuntosRecogidaTipos".nombre AS "tipoRecogidaNombre",
    "PuntosRecogidaTipos".descripcion AS "tipoRecogidaDescripcion",
    "PuntosRecogida".rfid
   FROM ((("PuntosRecogida"
     JOIN "PuntosRecogidaTipos" ON (("PuntosRecogida"."puntosRecogidaTiposId" = "PuntosRecogidaTipos"."puntosRecogidaTiposId")))
     JOIN "Municipios" ON (("PuntosRecogida"."municipioId" = "Municipios"."municipioId")))
     JOIN "RutasRelPuntosRecogida" ON (("PuntosRecogida"."puntosRecogidaId" = "RutasRelPuntosRecogida"."puntosRecogidaId")));


ALTER TABLE puntosrecogidadetalleruta OWNER TO bilketa_web_user;

--
-- Name: VIEW puntosrecogidadetalleruta; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW puntosrecogidadetalleruta IS 'Vista que muestra los puntos de recogida, incluyendo id de ruta, con datos detallados (textos de tablas realacionadas)';


--
-- Name: rutasdetallepuntos; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW rutasdetallepuntos AS
 SELECT rutasdetalle."rutaId",
    rutasdetalle."rutasTiposId",
    rutasdetalle."tiempoAprox",
    rutasdetalle."residuosTiposId" AS "rutaResiduosTipoId",
    rutasdetalle.identificacion,
    rutasdetalle."rutaTipoDescripcion",
    rutasdetalle."residuosTipoDescripcion" AS "rutaResiduosTipoDescripcion",
    rutasdetalle."rutaTipoNombre" AS "rutaResiduosTipoNombre",
    puntosrecogidadetalleruta."puntosRecogidaId",
    puntosrecogidadetalleruta.orden,
    puntosrecogidadetalleruta.posicion,
    puntosrecogidadetalleruta."puntosRecogidaTiposId",
    puntosrecogidadetalleruta."municipioId",
    puntosrecogidadetalleruta."nombreDescriptivo",
    puntosrecogidadetalleruta.municipio,
    puntosrecogidadetalleruta.barrio,
    puntosrecogidadetalleruta."tipoRecogidaNombre",
    puntosrecogidadetalleruta."tipoRecogidaDescripcion",
    puntosrecogidadetalleruta.rfid,
    NULL::integer AS "puntosDescargaId",
    NULL::character varying AS "puntosDescargaIden",
    NULL::integer AS "descargaResiduosTiposId",
    NULL::character varying AS "descargaNombre",
    NULL::text AS "descargaDescripcion",
    NULL::text AS "descargaResiduosTipoDescripcion",
    NULL::character varying AS "descargaResiduosTipoNombre"
   FROM (puntosrecogidadetalleruta
     JOIN rutasdetalle ON ((puntosrecogidadetalleruta."rutaId" = rutasdetalle."rutaId")))
UNION
 SELECT rutasdetalle."rutaId",
    rutasdetalle."rutasTiposId",
    rutasdetalle."tiempoAprox",
    rutasdetalle."residuosTiposId" AS "rutaResiduosTipoId",
    rutasdetalle.identificacion,
    rutasdetalle."rutaTipoDescripcion",
    rutasdetalle."residuosTipoDescripcion" AS "rutaResiduosTipoDescripcion",
    rutasdetalle."rutaTipoNombre" AS "rutaResiduosTipoNombre",
    NULL::integer AS "puntosRecogidaId",
    (9999)::smallint AS orden,
    puntosdescargadetalle.posicion,
    NULL::integer AS "puntosRecogidaTiposId",
    NULL::integer AS "municipioId",
    NULL::character varying AS "nombreDescriptivo",
    NULL::character varying AS municipio,
    NULL::character varying AS barrio,
    NULL::character varying AS "tipoRecogidaNombre",
    NULL::text AS "tipoRecogidaDescripcion",
    NULL::character varying AS rfid,
    puntosdescargadetalle."puntosDescargaId",
    puntosdescargadetalle."puntosDescargaIden",
    puntosdescargadetalle."residuosTiposId" AS "descargaResiduosTiposId",
    puntosdescargadetalle.nombre AS "descargaNombre",
    puntosdescargadetalle.descripcion AS "descargaDescripcion",
    puntosdescargadetalle."residuosTipoDescripcion" AS "descargaResiduosTipoDescripcion",
    puntosdescargadetalle."residuosTipoNombre" AS "descargaResiduosTipoNombre"
   FROM (puntosdescargadetalle
     JOIN rutasdetalle ON ((puntosdescargadetalle."puntosDescargaId" = rutasdetalle."puntosDescargaId")));


ALTER TABLE rutasdetallepuntos OWNER TO bilketa_web_user;

--
-- Name: VIEW rutasdetallepuntos; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW rutasdetallepuntos IS 'Vista que muestra la union de los puntos de recogida y descarga de las rutas con datos detallados (textos de tablas realacionadas)';


--
-- Name: turnosdetalle; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW turnosdetalle AS
 SELECT "Turnos"."turnoId",
    "Turnos".fecha,
    "Turnos"."horaInicio",
    "Turnos"."horaFinal",
    "TurnosRelCamiones".orden,
    "Camiones"."camionId",
    "Camiones".matricula,
    "Operarios"."operarioId",
    "Operarios".nombre AS "nombreOperario",
    "Operarios"."rolId",
    "Roles".descripcion AS "rolDescripcion",
    "Roles".rol,
    "TurnosRelCamiones"."origenPuntoRecogidaId",
    "TurnosRelCamiones"."tabletId",
    rutasdetalle."rutaId",
    rutasdetalle."rutasTiposId",
    rutasdetalle."tiempoAprox",
    rutasdetalle."puntosDescargaId",
    rutasdetalle."residuosTiposId",
    rutasdetalle.identificacion,
    rutasdetalle."rutaTipoDescripcion",
    rutasdetalle."rutaTipoNombre",
    rutasdetalle."residuosTipoDescripcion",
    rutasdetalle."residuosTipoNombre"
   FROM (((((("Turnos"
     LEFT JOIN "TurnosRelCamiones" ON (("Turnos"."turnoId" = "TurnosRelCamiones"."turnoId")))
     LEFT JOIN "TurnosCamionesRelOperarios" ON (("TurnosRelCamiones".id = "TurnosCamionesRelOperarios"."turnosRelCamionesId")))
     LEFT JOIN rutasdetalle ON (("Turnos"."rutaId" = rutasdetalle."rutaId")))
     LEFT JOIN "Camiones" ON (("TurnosRelCamiones"."camionesId" = "Camiones"."camionId")))
     LEFT JOIN "Operarios" ON (("TurnosCamionesRelOperarios"."operarioId" = "Operarios"."operarioId")))
     LEFT JOIN "Roles" ON (("Operarios"."rolId" = "Roles".id)));


ALTER TABLE turnosdetalle OWNER TO bilketa_web_user;

--
-- Name: VIEW turnosdetalle; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW turnosdetalle IS 'Vista que muestra los turnos en detalle (textos de tablas realacionadas)';


--
-- Name: turnosparadaspuntos; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW turnosparadaspuntos AS
 SELECT "Turnos"."turnoId",
    "Turnos".fecha,
    "Turnos"."horaInicio",
    "Turnos"."horaFinal",
    "TurnosRelCamiones".orden,
    "Camiones".matricula,
    "Paradas"."paradaId",
    "Paradas"."turnosCamionesId",
    "Paradas".finalizado,
    "Paradas"."horaInicio" AS "paradaHoraInicio",
    "Paradas"."horaFinal" AS "paradaHoraFinal",
    puntosrecogidadetalle."puntosRecogidaId",
    puntosrecogidadetalle."puntosRecogidaTiposId",
    puntosrecogidadetalle.posicion,
    puntosrecogidadetalle."nombreDescriptivo",
    puntosrecogidadetalle.municipio,
    puntosrecogidadetalle."municipioId",
    puntosrecogidadetalle.barrio,
    puntosrecogidadetalle."tipoRecogidaNombre",
    puntosrecogidadetalle."tipoRecogidaDescripcion",
    puntosrecogidadetalle.rfid
   FROM ((((("Turnos"
     JOIN rutasdetalle ON (("Turnos"."rutaId" = rutasdetalle."rutaId")))
     JOIN "TurnosRelCamiones" ON (("Turnos"."turnoId" = "TurnosRelCamiones"."turnoId")))
     JOIN "Camiones" ON (("TurnosRelCamiones"."camionesId" = "Camiones"."camionId")))
     JOIN "Paradas" ON (("TurnosRelCamiones".id = "Paradas"."turnosCamionesId")))
     JOIN puntosrecogidadetalle ON ((puntosrecogidadetalle."puntosRecogidaId" = "Paradas"."puntosRecogidasId")));


ALTER TABLE turnosparadaspuntos OWNER TO bilketa_web_user;

--
-- Name: VIEW turnosparadaspuntos; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW turnosparadaspuntos IS 'Vista que muestra las Paradas realizadas por un vehiculo en un turno datos detallados de las rutas (textos de tablas realacionadas)';


--
-- Name: turnosrutapuntos; Type: VIEW; Schema: public; Owner:
--

CREATE VIEW turnosrutapuntos AS
 SELECT "Turnos"."turnoId",
    "Turnos".fecha,
    "Turnos"."horaInicio",
    "Turnos"."horaFinal",
    rutasdetallepuntos."rutaId",
    rutasdetallepuntos."rutasTiposId",
    rutasdetallepuntos."tiempoAprox",
    rutasdetallepuntos."rutaResiduosTipoId",
    rutasdetallepuntos.identificacion,
    rutasdetallepuntos."rutaTipoDescripcion",
    rutasdetallepuntos."rutaResiduosTipoDescripcion",
    rutasdetallepuntos."rutaResiduosTipoNombre",
    rutasdetallepuntos."puntosRecogidaId",
    rutasdetallepuntos.orden,
    rutasdetallepuntos.posicion,
    rutasdetallepuntos."puntosRecogidaTiposId",
    rutasdetallepuntos."municipioId",
    rutasdetallepuntos."nombreDescriptivo",
    rutasdetallepuntos.municipio,
    rutasdetallepuntos.barrio,
    rutasdetallepuntos."tipoRecogidaNombre",
    rutasdetallepuntos."tipoRecogidaDescripcion",
    rutasdetallepuntos.rfid,
    rutasdetallepuntos."puntosDescargaId",
    rutasdetallepuntos."puntosDescargaIden",
    rutasdetallepuntos."descargaResiduosTiposId",
    rutasdetallepuntos."descargaNombre",
    rutasdetallepuntos."descargaDescripcion",
    rutasdetallepuntos."descargaResiduosTipoDescripcion",
    rutasdetallepuntos."descargaResiduosTipoNombre"
   FROM ("Turnos"
     JOIN rutasdetallepuntos ON (("Turnos"."rutaId" = rutasdetallepuntos."rutaId")));


ALTER TABLE turnosrutapuntos OWNER TO bilketa_web_user;

--
-- Name: VIEW turnosrutapuntos; Type: COMMENT; Schema: public; Owner:
--

COMMENT ON VIEW turnosrutapuntos IS 'Vista que muestra la union de los turnos con los puntos de recogida y descarga de las rutas con datos detallados de las rutas (textos de tablas realacionadas)';


--
-- Name: camionId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Camiones" ALTER COLUMN "camionId" SET DEFAULT nextval('"Camiones_camionId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "CentrosEmergencia" ALTER COLUMN id SET DEFAULT nextval('"CentrosEmergencia_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosApertura" ALTER COLUMN id SET DEFAULT nextval('"CodigosApertura_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosAperturaPrivados" ALTER COLUMN id SET DEFAULT nextval('"CodigosAperturaPrivados_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosPostales" ALTER COLUMN id SET DEFAULT nextval('"CodigosPostales_id_seq"'::regclass);


--
-- Name: compostadoresId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Compostadores" ALTER COLUMN "compostadoresId" SET DEFAULT nextval('"Compostadores_compostadoresId_seq"'::regclass);


--
-- Name: idRel; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "CompostadoresRelContribuyentes" ALTER COLUMN "idRel" SET DEFAULT nextval('"CompostadoresRelContribuyentes_idRel_seq"'::regclass);


--
-- Name: contribuyenteId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Contribuyentes" ALTER COLUMN "contribuyenteId" SET DEFAULT nextval('"Contribuyentes_contribuyenteId_seq"'::regclass);


--
-- Name: cuboId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Cubos" ALTER COLUMN "cuboId" SET DEFAULT nextval('"Cubos_cuboId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "CubosImportadores" ALTER COLUMN id SET DEFAULT nextval('"CubosImportadores_id_seq"'::regclass);


--
-- Name: cubosTiposId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "CubosTipos" ALTER COLUMN "cubosTiposId" SET DEFAULT nextval('"CubosTipos_cubosTiposId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Descargas" ALTER COLUMN id SET DEFAULT nextval('"Descargas_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Dispositivos" ALTER COLUMN id SET DEFAULT nextval('"Dispositivos_id_seq"'::regclass);


--
-- Name: emailId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Emails" ALTER COLUMN "emailId" SET DEFAULT nextval('"Emails_emailId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "FileAccess" ALTER COLUMN id SET DEFAULT nextval('"FileAccess_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Importadores" ALTER COLUMN id SET DEFAULT nextval('"Importadores_id_seq"'::regclass);


--
-- Name: incidenciaId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias" ALTER COLUMN "incidenciaId" SET DEFAULT nextval('"Incidencias_incidenciaId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearRoles" ALTER COLUMN id SET DEFAULT nextval('"KlearRoles_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearRolesSections" ALTER COLUMN id SET DEFAULT nextval('"KlearRolesSections_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearSections" ALTER COLUMN id SET DEFAULT nextval('"KlearSections_id_seq"'::regclass);


--
-- Name: userId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsers" ALTER COLUMN "userId" SET DEFAULT nextval('"KlearUsers_userId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsersRoles" ALTER COLUMN id SET DEFAULT nextval('"KlearUsersRoles_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Locuciones" ALTER COLUMN id SET DEFAULT nextval('"Locuciones_id_seq"'::regclass);


--
-- Name: llamadasId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogLlamadas" ALTER COLUMN "llamadasId" SET DEFAULT nextval('"LogLlamadas_llamadasId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasCompostador" ALTER COLUMN id SET DEFAULT nextval('"MarcasCompostador_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasCubo" ALTER COLUMN id SET DEFAULT nextval('"MarcasCubo_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasDispositivo" ALTER COLUMN id SET DEFAULT nextval('"MarcasDispositivo_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasPoste" ALTER COLUMN id SET DEFAULT nextval('"MarcasPoste_id_seq"'::regclass);


--
-- Name: municipioId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Municipios" ALTER COLUMN "municipioId" SET DEFAULT nextval('"Municipios_municipioId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCercania" ALTER COLUMN id SET DEFAULT nextval('"MunicipiosRelCercania_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCodigosPostales" ALTER COLUMN id SET DEFAULT nextval('"MunicipiosRelCodigosPostales_id_seq"'::regclass);


--
-- Name: operarioId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Operarios" ALTER COLUMN "operarioId" SET DEFAULT nextval('"Operarios_operarioId_seq"'::regclass);


--
-- Name: paradaId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Paradas" ALTER COLUMN "paradaId" SET DEFAULT nextval('"Paradas_paradaId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "PlantillasEmail" ALTER COLUMN id SET DEFAULT nextval('"PlantillasEmail_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "PlantillasSms" ALTER COLUMN id SET DEFAULT nextval('"PlantillasSms_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "PlantillasTelefono" ALTER COLUMN id SET DEFAULT nextval('"PlantillasTelefono_id_seq"'::regclass);


--
-- Name: posicionamientoId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Posicionamiento" ALTER COLUMN "posicionamientoId" SET DEFAULT nextval('"Posicionamiento_posicionamientoId_seq"'::regclass);


--
-- Name: postesId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Postes" ALTER COLUMN "postesId" SET DEFAULT nextval('"Postes_postesId_seq"'::regclass);


--
-- Name: postesTiposId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "PostesTipos" ALTER COLUMN "postesTiposId" SET DEFAULT nextval('"PostesTipos_postesTiposId_seq"'::regclass);


--
-- Name: puntosDescargaId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosDescarga" ALTER COLUMN "puntosDescargaId" SET DEFAULT nextval('"PuntosDescarga_puntosDescargaId_seq"'::regclass);


--
-- Name: puntosRecogidaId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosRecogida" ALTER COLUMN "puntosRecogidaId" SET DEFAULT nextval('"PuntosRecogida_puntosRecogidaId_seq"'::regclass);


--
-- Name: puntosRecogidaTiposId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosRecogidaTipos" ALTER COLUMN "puntosRecogidaTiposId" SET DEFAULT nextval('"PuntosRecogidaTipos_puntosRecogidaTiposId_seq"'::regclass);


--
-- Name: recogidaTiposId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "RecogidaTipos" ALTER COLUMN "recogidaTiposId" SET DEFAULT nextval('"RecogidaTipos_recogidaTiposId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas" ALTER COLUMN id SET DEFAULT nextval('"Recogidas_id_seq"'::regclass);


--
-- Name: residuosTiposId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "ResiduosTipos" ALTER COLUMN "residuosTiposId" SET DEFAULT nextval('"ResiduosTipos_residuosTiposId_seq"'::regclass);


--
-- Name: revisionId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Revision" ALTER COLUMN "revisionId" SET DEFAULT nextval('"Revision_revisionId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "RevisionTipos" ALTER COLUMN id SET DEFAULT nextval('"RevisionTipos_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Roles" ALTER COLUMN id SET DEFAULT nextval('"Roles_id_seq"'::regclass);


--
-- Name: rutaId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Rutas" ALTER COLUMN "rutaId" SET DEFAULT nextval('"Rutas_rutaId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "RutasRelPuntosRecogida" ALTER COLUMN id SET DEFAULT nextval('"RutasRelPuntosRecogida_id_seq"'::regclass);


--
-- Name: rutasTiposId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "RutasTipos" ALTER COLUMN "rutasTiposId" SET DEFAULT nextval('"RutasTipos_rutasTiposId_seq"'::regclass);


--
-- Name: telefonoId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Telefonos" ALTER COLUMN "telefonoId" SET DEFAULT nextval('"Telefonos_telefonoId_seq"'::regclass);


--
-- Name: tipoId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "TiposIncidencias" ALTER COLUMN "tipoId" SET DEFAULT nextval('"TiposIncidencias_tipoId_seq"'::regclass);


--
-- Name: turnoId; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "Turnos" ALTER COLUMN "turnoId" SET DEFAULT nextval('"Turnos_turnoId_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosCamionesRelOperarios" ALTER COLUMN id SET DEFAULT nextval('"TurnosCamionesRelOperarios_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosRelCamiones" ALTER COLUMN id SET DEFAULT nextval('"TurnosRelCamiones_id_seq"'::regclass);


--
-- Data for Name: Camiones; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Camiones" ("camionId", "cuandoPosicion", posicion, matricula, "precision", "posicionAddr", "pesoNeto", itv, otros, "posicionLat", "posicionLng", "costeHora") FROM stdin;
\.


--
-- Name: Camiones_camionId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Camiones_camionId_seq"', 29, true);


--
-- Data for Name: CentrosEmergencia; Type: TABLE DATA; Schema: public; Owner:
--

COPY "CentrosEmergencia" (id, ip, puerto, "puntoRecogidaId", identificador) FROM stdin;
\.


--
-- Name: CentrosEmergencia_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"CentrosEmergencia_id_seq"', 9, true);


--
-- Data for Name: CodigosApertura; Type: TABLE DATA; Schema: public; Owner:
--

COPY "CodigosApertura" (id, "fechaLlamada", "contribuyenteId", "codigoApertura", "centroEmergenciaId", "municipioId", activado) FROM stdin;
\.


--
-- Data for Name: CodigosAperturaPrivados; Type: TABLE DATA; Schema: public; Owner:
--

COPY "CodigosAperturaPrivados" (id, "codigoApertura", "municipioId", "contribuyenteId", description) FROM stdin;
1	5987	\N	\N	Trabajadores Recogidas (CESPA)
2	2073	\N	\N	Trabajadores Mancomunidad
3	4386	15	\N	Udaletxea Aretxabaleta
4	5879	58	\N	Udaletxea Oñati
5	4215	15	\N	013020064635
6	8455	15	\N	013020026795
7	5962	15	\N	013020047085
8	6658	15	\N	013020067996
9	9755	15	\N	013020052229
10	0015	15	\N	013020051486
11	1445	15	\N	013020052207
12	6277	15	\N	013020065252
15	9778	15	\N	013020004491
16	2877	15	\N	013020024186
17	3696	15	\N	013020049956
18	2144	15	\N	013020056129
20	1887	12	\N	Udaletxea Antzuola
21	6552	25	\N	Udaletxea Bergara
22	3811	36	\N	Udaletxea Eskoriatza
23	1744	36	\N	034020014033-TXALAPARTA TABERNA
24	6991	36	\N	034020032073-HEMEN GARBIKETAK, S.L.
19	6744	15	\N	013020054178
\.


--
-- Name: CodigosAperturaPrivados_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"CodigosAperturaPrivados_id_seq"', 24, true);


--
-- Name: CodigosApertura_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"CodigosApertura_id_seq"', 1159, true);


--
-- Data for Name: CodigosPostales; Type: TABLE DATA; Schema: public; Owner:
--

COPY "CodigosPostales" (id, "codigoPostal") FROM stdin;
48	20001
46	20002
33	20003
34	20004
49	20005
36	20006
38	20007
39	20008
37	20009
45	20010
29	20011
42	20012
44	20013
40	20014
47	20015
35	20016
43	20017
41	20018
30	20070
31	20071
32	20080
93	20100
92	20110
16	20115
59	20120
54	20128
98	20130
9	20140
2	20150
105	20159
73	20160
100	20170
84	20180
21	20200
74	20210
17	20211
87	20212
62	20213
80	20214
103	20215
90	20216
7	20217
94	20218
27	20220
75	20230
88	20240
101	20247
13	20248
71	20249
76	20250
20	20259
6	20260
63	20267
8	20268
1	20269
11	20270
70	20271
61	20280
68	20300
66	20301
67	20302
64	20303
69	20304
65	20305
97	20400
89	20490
23	20491
24	20492
51	20493
60	20494
5	20495
26	20496
79	20500
77	20530
56	20540
15	20550
83	20560
14	20567
86	20569
25	20570
12	20577
10	20578
91	20580
96	20590
50	20600
52	20690
99	20700
57	20709
18	20720
19	20730
55	20737
82	20738
22	20739
104	20740
4	20749
106	20750
85	20759
102	20800
58	20808
3	20809
95	20810
28	20820
72	20829
81	20830
78	20850
53	20870
\.


--
-- Name: CodigosPostales_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"CodigosPostales_id_seq"', 1, true);


--
-- Data for Name: Compostadores; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Compostadores" ("compostadoresId", "altaFecha", emplazamiento, "ventajasComunidad", privado, "compostadoresIden", posicion, "marcaCompostadorId", "posicionAddr", "posicionLat", "posicionLng") FROM stdin;
\.


--
-- Data for Name: CompostadoresRelContribuyentes; Type: TABLE DATA; Schema: public; Owner:
--

COPY "CompostadoresRelContribuyentes" ("idRel", "compostadoresId", "contribuyenteId") FROM stdin;
\.


--
-- Name: CompostadoresRelContribuyentes_idRel_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"CompostadoresRelContribuyentes_idRel_seq"', 1, true);


--
-- Name: Compostadores_compostadoresId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Compostadores_compostadoresId_seq"', 1, true);


--
-- Data for Name: Contribuyentes; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Contribuyentes" ("contribuyenteId", "contribuyenteIden", "coeficienteEntornoContribuyente", "coeficienteEntornoZona", "coeficienteEntornoPueblo", "idContribuyenteUsoa", nombre, "municipioId", "createdOn", nif, cuenta, intuitivo, "codigoCalle", direccion, portal, bis, escalera, piso, mano, "otrosDomicilio", tarifa, cantidad, "direccionFiscal", "portalFiscal", "bisFiscal", "escaleraFiscal", "pisoFiscal", "manoFiscal", "localidadFiscal", "pkFiscal", "provinciaFiscal", excluido, "posteId", ivr) FROM stdin;
\.


--
-- Name: Contribuyentes_contribuyenteId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Contribuyentes_contribuyenteId_seq"', 24490, true);


--
-- Data for Name: Cubos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Cubos" ("cuboId", "contribuyenteId", "cubosTiposId", "diaAsignado", "diaBaja", baja, "puntosRecogidaId", rfid, ubicacion, "posteId", "centrosEmergenciaId") FROM stdin;
\.


--
-- Data for Name: CubosImportadores; Type: TABLE DATA; Schema: public; Owner:
--

COPY "CubosImportadores" (id, "csvFileSize", "csvMimeType", "csvBaseName", estado) FROM stdin;
\.


--
-- Name: CubosImportadores_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"CubosImportadores_id_seq"', 1, false);


--
-- Data for Name: CubosTipos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "CubosTipos" ("cubosTiposId", tipo, litros, color, fabricante, altura, anchura, longitud, llave, "llenadoObligatorio", "marcaCuboId") FROM stdin;
23	OND02	60.00	Urdina	Helesi	0.6600	0.4400	0.5000	f	f	\N
24	OND03	60.00	Horia	Helesi	0.6600	0.4400	0.5000	f	f	\N
25	OND04	60.00	Grisa	Helesi	0.6600	0.4400	0.5000	f	f	\N
4	ONA02	10.00	Grisa	Sartori Ambiente	0.3150	0.2380	0.2750	f	f	\N
5	ONA03	10.00	Marroia	Lady Plastik	0.2900	0.2300	0.2300	f	f	\N
26	OND05	60.00	Marroia	Sulo	0.6600	0.4450	0.5160	f	f	\N
6	ONB01	20.00	Marroia	Lady Plastik	0.3600	0.3150	0.2950	f	f	\N
7	ONB02	20.00	Grisa	Lady Plastik	0.3600	0.3150	0.2950	f	f	\N
27	OND06	60.00	Urdina	Sulo	0.6600	0.4450	0.5160	f	f	\N
9	ONB03	20.00	Urdina	Sartori Ambiente	0.3530	0.2950	0.3400	f	f	\N
10	ONC01	40.00	Marroia	Sartori Ambiente	0.4450	0.4200	0.3650	f	f	\N
11	ONC02	40.00	Urdina	Sartori Ambiente	0.4450	0.4200	0.3650	f	f	\N
12	ONC03	40.00	Horia	Sartori Ambiente	0.4450	0.4200	0.3650	f	f	\N
13	ONC04	40.00	Grisa	Sartori Ambiente	0.4450	0.4200	0.3650	f	f	\N
14	ONC05	40.00	Marroia	Lady Plastik	0.4000	0.4400	0.4000	f	f	\N
15	ONC06	40.00	Urdina	Lady Plastik	0.4000	0.4400	0.4000	f	f	\N
16	ONC07	40.00	Horia	Lady Plastik	0.4000	0.4400	0.4000	f	f	\N
17	ONC08	40.00	Grisa	Lady Plastik	0.4000	0.4400	0.4000	f	f	\N
18	ONC09	40.00	Marroia	Eurosintex	0.4870	0.3840	0.3530	f	f	\N
19	ONC10	40.00	Urdina	Eurosintex	0.4870	0.3840	0.3530	f	f	\N
20	ONC11	40.00	Horia	Eurosintex	0.4870	0.3840	0.3530	f	f	\N
21	ONC12	40.00	Grisa	Eurosintex	0.4870	0.3840	0.3530	f	f	\N
22	OND01	60.00	Marroia	Helesi	0.6600	0.4400	0.5000	f	f	\N
28	OND07	60.00	Horia	Sulo	0.6600	0.4450	0.5160	f	f	\N
29	OND08	60.00	Grisa	Sulo	0.6600	0.4450	0.5160	f	f	\N
30	ONE01	80.00	Marroia	Contenur	0.8550	0.4800	0.5500	f	f	\N
31	ONE02	80.00	Urdina	Contenur	0.8550	0.4800	0.5500	f	f	\N
32	ONE03	80.00	Horia	Contenur	0.8550	0.4800	0.5500	f	f	\N
59	ONE04	80.00	Grisa	Contenur	0.8550	0.4800	0.5500	f	f	\N
100	ONJ05	1000.00	Marroia	Contenur	1.3250	1.3700	1.0770	f	f	\N
101	ONJ06	1000.00	Urdina	Contenur	1.3250	1.3700	1.0770	f	f	\N
102	ONJ07	1000.00	Horia	Contenur	1.3250	1.3700	1.0770	f	f	\N
3	ONA01	10.00	Marroia	Sartori Ambiente	0.3150	0.2380	0.2750	f	f	\N
65	ONF01	120.00	Marroia	Contenur	0.9750	0.4800	0.5530	f	f	\N
66	ONF02	120.00	Urdina	Contenur	0.9750	0.4800	0.5530	f	f	\N
67	ONF03	120.00	Horia	Contenur	0.9750	0.4800	0.5530	f	f	\N
68	ONF04	120.00	Grisa	Contenur	0.9750	0.4800	0.5530	f	f	\N
69	ONF05	120.00	Marroia	Contenur	0.9750	0.4800	0.5530	f	f	\N
103	ONJ08	1000.00	Grisa	Contenur	1.3250	1.3700	1.0770	f	f	\N
70	ONF06	120.00	Urdina	Contenur	0.9750	0.4800	0.5530	f	f	\N
71	ONF07	120.00	Horia	Contenur	0.9750	0.4800	0.5530	f	f	\N
72	ONF08	120.00	Grisa	Contenur	0.9750	0.4800	0.5530	f	f	\N
73	ONF09	120.00	Marroia	Lady Plastik	1.0050	0.5050	0.5550	f	f	\N
104	ONJ09	1000.00	Berdea	Contenur	1.3250	1.3700	1.0770	f	f	\N
74	ONF10	120.00	Urdina	Lady Plastik	1.0050	0.5050	0.5550	f	f	\N
75	ONF11	120.00	Horia	Lady Plastik	1.0050	0.5050	0.5550	f	f	\N
76	ONF12	120.00	Grisa	Lady Plastik	1.0050	0.5050	0.5550	f	f	\N
77	ONG01	240.00	Marroia	Contenur	1.0560	0.5720	0.7310	f	f	\N
78	ONG02	240.00	Urdina	Contenur	1.0560	0.5720	0.7310	f	f	\N
79	ONG03	240.00	Horia	Contenur	1.0560	0.5720	0.7310	f	f	\N
80	ONG04	240.00	Grisa	Contenur	1.0560	0.5720	0.7310	f	f	\N
81	ONG05	240.00	Marroia	Contenur	1.0560	0.5720	0.7310	f	f	\N
82	ONG06	240.00	Urdina	Contenur	1.0560	0.5720	0.7310	f	f	\N
83	ONG07	240.00	Horia	Contenur	1.0560	0.5720	0.7310	f	f	\N
84	ONG08	240.00	Grisa	Contenur	1.0560	0.5720	0.7310	f	f	\N
85	ONG09	240.00	Urdina	Lady Plastik	1.1000	0.5850	0.7400	f	f	\N
86	ONG10	240.00	Horia	Lady Plastik	1.1000	0.5850	0.7400	f	f	\N
87	ONG11	240.00	Grisa	Lady Plastik	1.1000	0.5850	0.7400	f	f	\N
89	ONH02	360.00	Urdina	Contenur	1.0950	0.6200	0.8500	f	f	\N
90	ONH03	360.00	Horia	Contenur	1.0950	0.6200	0.8500	f	f	\N
91	ONH04	360.00	Grisa	Contenur	1.0950	0.6200	0.8500	f	f	\N
92	ONH05	360.00	Urdina	Lady Plastik	1.1150	0.6650	0.8800	f	f	\N
93	ONH06	360.00	Horia	Lady Plastik	1.1150	0.6650	0.8800	f	f	\N
94	ONH07	360.00	Grisa	Lady Plastik	1.1150	0.6650	0.8800	f	f	\N
95	ONI01	800.00	Berdea	Contenur	1.3000	1.3700	0.7970	f	f	\N
96	ONJ01	1000.00	Urdina	Contenur	1.3250	1.3700	1.0770	f	f	\N
97	ONJ02	1000.00	Horia	Contenur	1.3250	1.3700	1.0770	f	f	\N
98	ONJ03	1000.00	Grisa	Contenur	1.3250	1.3700	1.0770	f	f	\N
99	ONJ04	1000.00	Berdea	Contenur	1.3250	1.3700	1.0770	f	f	\N
105	ONK01	2400.00	Berdea	OMB	1.6000	1.8800	1.2650	f	f	\N
106	ONK02	3000.00	Berdea	Contenur	1.6250	1.8800	1.3700	f	f	\N
107	ONK03	3200.00	Berdea	OMB	1.7350	1.8800	1.4650	f	f	\N
108	ONL01	3000.00	Urdina	Navaplex	1.9000	1.4600	1.4600	f	f	\N
109	ONL02	3000.00	Horia	Navaplex	1.9000	1.4600	1.4600	f	f	\N
110	ONL03	3000.00	Urdina	Emiros	1.8000	1.6500	1.2000	f	f	\N
111	ONL04	3000.00	Zuria	Xuquer	2.0000	1.0900	2.0600	f	f	\N
112	ONM01	4000.00	Urdina	Biurrarena	1.7500	1.5500	1.3500	f	f	\N
113	ONM02	4000.00	Horia	Biurrarena	1.7500	1.5500	1.3500	f	f	\N
114	ONM03	4000.00	Urdina	Equinord	1.7500	1.5500	1.3500	f	f	\N
115	ONM04	4000.00	Horia	Equinord	1.7500	1.5500	1.3500	f	f	\N
\.


--
-- Name: CubosTipos_cubosTiposId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"CubosTipos_cubosTiposId_seq"', 115, true);


--
-- Name: Cubos_cuboId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Cubos_cuboId_seq"', 2, true);


--
-- Data for Name: Descargas; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Descargas" (id, "camionId", "puntoDescargaId", kilos, "createdOn") FROM stdin;
\.


--
-- Name: Descargas_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Descargas_id_seq"', 1, false);


--
-- Data for Name: Dispositivos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Dispositivos" (id, imei, "marcaDispositivoId", "fechaCompra") FROM stdin;
\.


--
-- Name: Dispositivos_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Dispositivos_id_seq"', 1, true);


--
-- Data for Name: Emails; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Emails" ("emailId", "contribuyenteId", email, "createdOn") FROM stdin;
\.


--
-- Name: Emails_emailId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Emails_emailId_seq"', 6, true);


--
-- Data for Name: FileAccess; Type: TABLE DATA; Schema: public; Owner:
--

COPY "FileAccess" (id, "accessFileSize", "accessMimeType", "accessBaseName", "uploadOn") FROM stdin;
\.


--
-- Name: FileAccess_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"FileAccess_id_seq"', 1, false);


--
-- Data for Name: Importadores; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Importadores" (id, "archivoFileSize", "archivoMimeType", "archivoBaseName", tipo, "className", estado) FROM stdin;
\.


--
-- Name: Importadores_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Importadores_id_seq"', 6, true);


--
-- Data for Name: Incidencias; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Incidencias" ("incidenciaId", "fechaAlta", "contribuyenteId", "createdOn", "paradaId", "cuboId", "postesId", "compostadorId", "camionId", "puntoRecogidaId", observaciones, entidad, solucionada, "observacionSolucion", "tipoId") FROM stdin;
\.


--
-- Name: Incidencias_incidenciaId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Incidencias_incidenciaId_seq"', 84, true);


--
-- Data for Name: KlearRoles; Type: TABLE DATA; Schema: public; Owner:
--

COPY "KlearRoles" (id, name, description, identifier) FROM stdin;
1	Administrador	Usuario con permisos de administrador	admin
2	Usuario	Con roles para un usuario normal con restricciones.	user
\.


--
-- Data for Name: KlearRolesSections; Type: TABLE DATA; Schema: public; Owner:
--

COPY "KlearRolesSections" (id, "klearRoleId", "klearSectionId") FROM stdin;
\.


--
-- Name: KlearRolesSections_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"KlearRolesSections_id_seq"', 1, false);


--
-- Name: KlearRoles_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"KlearRoles_id_seq"', 1, false);


--
-- Data for Name: KlearSections; Type: TABLE DATA; Schema: public; Owner:
--

COPY "KlearSections" (id, name, description, identifier) FROM stdin;
3	Camiones		CamionesList
4	Centro de Emergencia		CentrosEmergenciaList
6	Compostadores		CompostadoresList
8	ContribuyentesList		ContribuyentesList
9			CubosList
10			CubosTiposList
11			DescargasList
12			DispositivosList
13			EmailsList
14			IncidenciasList
15			KlearRolesList
16			KlearRolesSectionsList
17			KlearSectionsList
18			KlearUsersList
19			KlearUsersRolesList
20			LogEmailsList
21			LogLlamadasList
22			LogSmsList
23			MarcasCompostadorList
24			MarcasCuboList
25			MarcasDispositivoList
26			MarcasPosteList
27			MunicipiosList
28			OperariosList
29			OperariosRelTurnoList
30			ParadasList
31			PlantillasEmailList
32			PlantillasSmsList
33			PlantillasTelefonoList
34			PosicionamientoList
35			PostesList
36			PostesTiposList
37			PuertasList
38			PuntosDescargaList
39			PuntosRecogidaList
40			PuntosRecogidaTiposList
41			RecogidaTiposList
42			RecogidasList
43			ResiduosTiposList
44			RevisionList
45			RevisionTiposList
46			RolesList
47			RutasList
48			RutasRelPuntosRecogidaList
49			RutasTiposList
50			TelefonosList
51			TiposIncidenciasList
52			TurnosList
53			TurnosCamionesRelOperariosList
54			TurnosRelCamionesList
5	Codigo de apertura		CodigoAperturaList
7	Relacion Compostadores Contribuyentes		CompostadoresRelContribuyentesList
\.


--
-- Name: KlearSections_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"KlearSections_id_seq"', 1, false);


--
-- Data for Name: KlearUsers; Type: TABLE DATA; Schema: public; Owner:
--

COPY "KlearUsers" ("userId", login, email, pass, active, "createdOn", "updateOn") FROM stdin;
\.


--
-- Data for Name: KlearUsersRoles; Type: TABLE DATA; Schema: public; Owner:
--

COPY "KlearUsersRoles" (id, "klearUserId", "klearRoleId") FROM stdin;
\.


--
-- Name: KlearUsersRoles_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"KlearUsersRoles_id_seq"', 1, false);


--
-- Name: KlearUsers_userId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"KlearUsers_userId_seq"', 2, true);


--
-- Data for Name: Locuciones; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Locuciones" (id, iden, descripcion, "esLocFileSize", "esLocMimeType", "esLocBaseName", "euLocFileSize", "euLocMimeType", "euLocBaseName", "esLocCodificadoFileSize", "esLocCodificadoMimeType", "esLocCodificadoBaseName", "euLocCodificadoFileSize", "euLocCodificadoMimeType", "euLocCodificadoBaseName", estado) FROM stdin;
17	finalConfirmarCentro	finalConfirmarCentro	289778	audio/x-wav; charset=binary	Herria bai_es.wav	313040	audio/x-wav; charset=binary	Herria bai.wav	52586	audio/x-wav; charset=binary	encoded.wav	84698	audio/x-wav; charset=binary	encoded.wav	encoded
8	insertarCodCliente	insertarCodCliente	953958	audio/x-wav; charset=binary	04-Introducir id contribuyente.wav	963222	audio/x-wav; charset=binary	04- Sarrtu zergadun IDa.wav	173072	audio/x-wav; charset=binary	encoded.wav	174754	audio/x-wav; charset=binary	encoded.wav	encoded
13	codAperturaConfirmado	codAperturaConfirmado	190394	audio/x-wav; charset=binary	Zabaltze kodea baieztatua_es.wav	213092	audio/x-wav; charset=binary	Zabaltze kodea baieztatua.wav	51866	audio/x-wav; charset=binary	encoded.wav	38676	audio/x-wav; charset=binary	encoded.wav	encoded
7	seleccionarIdioma	seleccionarIdioma	334798	audio/mpeg; charset=binary	LOKUZIOA Euskeraz 01.mp3	334798	audio/mpeg; charset=binary	LOKUZIOA Euskeraz 01.mp3	333140	audio/x-wav; charset=binary	encoded.wav	116378	audio/x-wav; charset=binary	encoded.wav	encoded
9	entradillaConfirmarCentro	entradillaConfirmarCentro	256094	audio/x-wav; charset=binary	Larrialdiguneak hemen daude_es.wav	220974	audio/x-wav; charset=binary	Larrialdiguneak hemen daude.wav	43802	audio/x-wav; charset=binary	encoded.wav	40106	audio/x-wav; charset=binary	encoded.wav	encoded
14	asociarDid	asociarDid	492866	audio/x-wav; charset=binary	10- Registrar telef.wav	505560	audio/x-wav; charset=binary	10-telef erregistratu.wav	89428	audio/x-wav; charset=binary	encoded.wav	100338	audio/x-wav; charset=binary	encoded.wav	encoded
15	despedida	despedida	38465	audio/mpeg; charset=binary	3.- Agurra_es.mp3	52676	audio/mpeg; charset=binary	3.- Agurra.mp3	36808	audio/x-wav; charset=binary	encoded.wav	51018	audio/x-wav; charset=binary	encoded.wav	encoded
12	entradillaConfirmarCodApertura	entradillaConfirmarCodApertura	91128	audio/mpeg; charset=binary	2.- El codigo es.mp3	83605	audio/mpeg; charset=binary	2.- Irekiera kodea hau da.mp3	89470	audio/x-wav; charset=binary	encoded.wav	81948	audio/x-wav; charset=binary	encoded.wav	encoded
16	finalConfirmarCodApertura	finalConfirmarCodApertura	449806	audio/x-wav; charset=binary	Kodea ok-1_es.wav	431396	audio/x-wav; charset=binary	Kodea ok-1.wav	72602	audio/x-wav; charset=binary	encoded.wav	78276	audio/x-wav; charset=binary	encoded.wav	encoded
10	marqueCodPostal	marqueCodPostal	229144	audio/x-wav; charset=binary	Sartu PK_es.wav	192050	audio/x-wav; charset=binary	Sartu PK.wav	41588	audio/x-wav; charset=binary	encoded.wav	47834	audio/x-wav; charset=binary	encoded.wav	encoded
11	reintentar	reintentar	76917	audio/mpeg; charset=binary	5.- Intentelo de nuevo.mp3	38047	audio/mpeg; charset=binary	6.- Saiatu berriro mesedez.mp3	71450	audio/x-wav; charset=binary	encoded.wav	36390	audio/x-wav; charset=binary	encoded.wav	encoded
26	problemasTecnicos	Ha ocurrido un problema	441384	audio/x-wav; charset=binary	Arazo teknikoak_es.wav	339454	audio/x-wav; charset=binary	Arazo teknikoak.wav	101978	audio/x-wav; charset=binary	encoded.wav	61598	audio/x-wav; charset=binary	encoded.wav	encoded
5	codPostalInvalido	codPostalInvalido	130638	audio/x-wav; charset=binary	Codigo invalido.wav	187146	audio/x-wav; charset=binary	Kodea ez zuzena.wav	23718	audio/x-wav; charset=binary	encoded.wav	39194	audio/x-wav; charset=binary	encoded.wav	encoded
27	Espere	Espere	236582	audio/x-wav; charset=binary	Itxaron balidazioa_es.wav	373536	audio/x-wav; charset=binary	Itxaron balidazioa.wav	58202	audio/x-wav; charset=binary	encoded.wav	67780	audio/x-wav; charset=binary	encoded.wav	encoded
\.


--
-- Name: Locuciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Locuciones_id_seq"', 28, true);


--
-- Data for Name: LogEmails; Type: TABLE DATA; Schema: public; Owner:
--

COPY "LogEmails" ("emailMensajeId", mensaje, "createdOn", asunto, email, "incidenciaId") FROM stdin;
\.


--
-- Name: LogEmails_emailMensajeId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"LogEmails_emailMensajeId_seq"', 4, true);


--
-- Data for Name: LogLlamadas; Type: TABLE DATA; Schema: public; Owner:
--

COPY "LogLlamadas" ("llamadasId", "incidenciaId", dia, hora, contactado, "plantillasTelefonoId", telefono) FROM stdin;
\.


--
-- Name: LogLlamadas_llamadasId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"LogLlamadas_llamadasId_seq"', 27, true);


--
-- Data for Name: LogSms; Type: TABLE DATA; Schema: public; Owner:
--

COPY "LogSms" ("smsMensajeId", mensaje, "createdOn", "incidenciaId", telefono, "plantillasSmsId") FROM stdin;
\.


--
-- Name: LogSms_smsMensajeId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"LogSms_smsMensajeId_seq"', 8, true);


--
-- Data for Name: MarcasCompostador; Type: TABLE DATA; Schema: public; Owner:
--

COPY "MarcasCompostador" (id, marca, tipo, "createdOn") FROM stdin;
\.


--
-- Name: MarcasCompostador_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"MarcasCompostador_id_seq"', 1, true);


--
-- Data for Name: MarcasCubo; Type: TABLE DATA; Schema: public; Owner:
--

COPY "MarcasCubo" (id, marca, tipo, "createdOn") FROM stdin;
3	Sartori Ambiente		2014-11-04 12:41:19
4	Lady Plastik		2014-11-04 12:41:34
5	Eurosintex		2014-11-04 12:41:57
6	Helesi		2014-11-04 12:42:13
7	Sulo		2014-11-04 12:42:26
8	Contenur		2014-11-04 12:42:46
9	OMB		2014-11-04 12:43:05
10	Navaplex		2014-11-04 12:43:32
11	Emiros		2014-11-04 12:43:51
12	Xuquer		2014-11-04 12:44:14
13	Biurrarena		2014-11-04 12:44:29
14	Equinord		2014-11-04 12:45:07
\.


--
-- Name: MarcasCubo_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"MarcasCubo_id_seq"', 14, true);


--
-- Data for Name: MarcasDispositivo; Type: TABLE DATA; Schema: public; Owner:
--

COPY "MarcasDispositivo" (id, marca, tipo, "createdOn") FROM stdin;
1	DURROCOMM	X5	2015-03-24 15:22:57
\.


--
-- Name: MarcasDispositivo_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"MarcasDispositivo_id_seq"', 1, true);


--
-- Data for Name: MarcasPoste; Type: TABLE DATA; Schema: public; Owner:
--

COPY "MarcasPoste" (id, marca, tipo, "createdOn") FROM stdin;
2	Doilan		2014-11-04 08:40:09
1	Mena Pajuelo		2014-11-04 08:28:51
\.


--
-- Name: MarcasPoste_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"MarcasPoste_id_seq"', 2, true);


--
-- Data for Name: Municipios; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Municipios" ("municipioId", municipio, "createdOn", "esLocFileSize", "esLocMimeType", "esLocBaseName", "euLocFileSize", "euLocMimeType", "euLocBaseName", "esLocCodificadoFileSize", "esLocCodificadoMimeType", "esLocCodificadoBaseName", "euLocCodificadoFileSize", "euLocCodificadoMimeType", "euLocCodificadoBaseName", estado) FROM stdin;
18	Azkoitia	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
19	Azpeitia	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
20	Baliarrain	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
21	Beasain	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
22	Beizama	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
23	Belauntza	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
24	Berastegi	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
26	Bidegoyan	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
27	Brinkola	2013-10-14 07:31:13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
28	Deba	2013-10-14 07:31:13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
30	Eibar	2013-10-14 07:31:14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
31	Elduain	2013-10-14 07:31:14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
32	Elgeta	2013-10-14 07:31:14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
33	Elgoibar	2013-10-14 07:31:14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
37	Ezkio-itsaso	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
38	Getaria	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
39	Hernani	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
40	Hernialde	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
41	Hondarribia	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
42	Idiazabal	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
43	Ikaztegieta	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
44	Irun	2013-10-14 07:31:15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
45	Irura	2013-10-14 07:31:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
46	Itsasondo	2013-10-14 07:31:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
47	Itziar	2013-10-14 07:31:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
48	Lasarte-oria	2013-10-14 07:31:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
49	Lazkao	2013-10-14 07:31:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
50	Legazpi	2013-10-14 07:31:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
51	Legorreta	2013-10-14 07:31:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
52	Leintz-gatzaga	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
53	Mendaro	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
55	Mutiloa	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
56	Mutriku	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
57	Nuarbe	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
59	Oiartzun	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
60	Oikia	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
61	Olabarrieta (oñati)	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
62	Olaberria	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
63	Ordizia	2013-10-14 07:31:17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
64	Orexa	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
65	Ormaiztegi	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
66	Osintxu	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
67	Pasai Antxo	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
68	Renteria	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
69	Salbatore	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
70	Santio Erreka	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
71	Soraluze	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
72	Tolosa	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
73	Urnieta	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
74	Urretxu	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
75	Usurbil	2013-10-14 07:31:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
76	Zaldibia	2013-10-14 07:31:19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
77	Zarautz	2013-10-14 07:31:19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
78	Zegama	2013-10-14 07:31:19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
79	Zestoa	2013-10-14 07:31:19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
80	Zizurkil	2013-10-14 07:31:19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
81	Zumaia	2013-10-14 07:31:19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
54	Arrasate	2013-10-14 07:31:17	5184	audio/mpeg; charset=binary	mondragon.mp3	5040	audio/mpeg; charset=binary	arrasate.mp3	20762	audio/x-wav; charset=binary	encoded.wav	20186	audio/x-wav; charset=binary	encoded.wav	encoded
29	Donostia	2013-10-14 07:31:13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
34	Ereñozu	2013-10-14 07:31:14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
2	Aduna	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
3	Aia	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
4	Aizarnazabal	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
5	Albiztur	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
6	Alegia	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
7	Alegia (gabiria)	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
8	Amezketa	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
9	Andoain	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
10	Angiozar	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
11	Anoeta	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
13	Arama	2013-10-14 07:31:11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
14	Arantzazu	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
16	Astigarraga	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
17	Ataun	2013-10-14 07:31:12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
35	Errezil	2013-10-14 07:31:14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending
12	Antzuola	2013-10-14 07:31:11	69546	audio/x-wav; charset=binary	Antzuola.wav	69546	audio/x-wav; charset=binary	Antzuola.wav	\N	\N	\N	12636	audio/x-wav; charset=binary	encoded.wav	encoded
36	Eskoriatza	2013-10-14 07:31:15	91024	audio/x-wav; charset=binary	Eskoriatza.wav	91024	audio/x-wav; charset=binary	Eskoriatza.wav	16532	audio/x-wav; charset=binary	encoded.wav	16532	audio/x-wav; charset=binary	encoded.wav	encoded
25	Bergara	2013-10-14 07:31:12	77304	audio/x-wav; charset=binary	Bergara.wav	77304	audio/x-wav; charset=binary	Bergara.wav	14042	audio/x-wav; charset=binary	encoded.wav	14042	audio/x-wav; charset=binary	encoded.wav	encoded
1	Abaltzisketa	2013-10-14 07:31:10	10656	audio/mpeg; charset=binary	localidadDefecto.mp3	10656	audio/mpeg; charset=binary	localidadDefecto.mp3	42650	audio/x-wav; charset=binary	encoded.wav	42650	audio/x-wav; charset=binary	encoded.wav	encoded
58	Oñati	2013-10-14 07:31:17	69548	audio/x-wav; charset=binary	On¦âati.wav	69548	audio/x-wav; charset=binary	On¦âati.wav	333140	audio/x-wav; charset=binary	encoded.wav	12636	audio/x-wav; charset=binary	encoded.wav	encoded
15	Aretxabaleta	2013-10-14 07:31:12	105056	audio/x-wav; charset=binary	Aretxabaleta.wav	105056	audio/x-wav; charset=binary	Aretxabaleta.wav	19076	audio/x-wav; charset=binary	encoded.wav	19076	audio/x-wav; charset=binary	encoded.wav	encoded
\.


--
-- Data for Name: MunicipiosRelCercania; Type: TABLE DATA; Schema: public; Owner:
--

COPY "MunicipiosRelCercania" (id, "municipioId", "municipioCercanoId") FROM stdin;
2	12	15
1	36	15
\.


--
-- Name: MunicipiosRelCercania_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"MunicipiosRelCercania_id_seq"', 2, true);


--
-- Data for Name: MunicipiosRelCodigosPostales; Type: TABLE DATA; Schema: public; Owner:
--

COPY "MunicipiosRelCodigosPostales" (id, "municipioId", "codigoPostalId") FROM stdin;
1	1	1
2	2	2
3	3	3
4	4	4
5	5	5
6	6	6
7	7	7
8	8	8
9	9	9
10	10	10
11	11	11
12	12	12
13	13	13
14	14	14
15	15	15
16	16	16
17	17	17
18	18	18
19	19	19
20	20	20
21	21	21
22	22	22
23	23	23
24	24	24
25	25	25
26	26	26
27	27	27
28	28	28
29	29	29
30	29	30
31	29	31
32	29	32
33	29	33
34	29	34
35	29	35
36	29	36
37	29	37
38	29	38
39	29	39
40	29	40
41	29	41
42	29	42
43	29	43
44	29	44
45	29	45
46	29	46
47	29	47
48	29	48
49	29	49
50	30	50
51	31	51
52	32	52
53	33	53
54	34	54
55	35	55
56	36	56
57	37	57
58	38	58
59	39	59
60	40	60
61	41	61
62	42	62
63	43	63
64	44	64
65	44	65
66	44	66
67	44	67
68	44	68
69	44	69
70	45	70
71	46	71
72	47	72
73	48	73
74	49	74
75	50	75
76	51	76
77	52	77
78	53	78
79	54	79
80	55	80
81	56	81
82	57	82
83	58	83
84	59	84
85	60	85
86	61	86
87	62	87
88	63	88
89	64	89
90	65	90
91	66	91
92	67	92
93	68	93
94	69	94
95	70	95
96	71	96
97	72	97
98	73	98
99	74	99
100	75	100
101	76	101
102	77	102
103	78	103
104	79	104
105	80	105
106	81	106
\.


--
-- Name: MunicipiosRelCodigosPostales_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"MunicipiosRelCodigosPostales_id_seq"', 1, true);


--
-- Name: Municipios_municipioId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Municipios_municipioId_seq"', 7, true);


--
-- Data for Name: Operarios; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Operarios" ("operarioId", nombre, "rolId") FROM stdin;
\.


--
-- Name: Operarios_operarioId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Operarios_operarioId_seq"', 71, true);


--
-- Data for Name: Paradas; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Paradas" ("paradaId", "turnosCamionesId", finalizado, "puntosRecogidasId", "createdOn", "horaInicio", "horaFinal") FROM stdin;
\.


--
-- Name: Paradas_paradaId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Paradas_paradaId_seq"', 1, false);


--
-- Data for Name: PlantillasEmail; Type: TABLE DATA; Schema: public; Owner:
--

COPY "PlantillasEmail" (id, asunto, mensaje, asunto_eu, mensaje_es, mensaje_eu) FROM stdin;
\.


--
-- Name: PlantillasEmail_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"PlantillasEmail_id_seq"', 1, true);


--
-- Data for Name: PlantillasSms; Type: TABLE DATA; Schema: public; Owner:
--

COPY "PlantillasSms" (id, asunto, mensaje, mensaje_es, mensaje_eu, asunto_es, asunto_eu) FROM stdin;
14	\N	\N	Atera behar zen frakzioari ez dagokien hondakinak aurkitu direnez, ez dira jaso.	Atera behar zen frakzioari ez dagokien hondakinak aurkitu direnez, ez dira jaso.	MZA01	MZA01
15	\N	\N	Atera behar zen frakzioari ez dagokien hondakinak aurkitu arren, jaso egin dira. Mesedez, hurrengorako akatsa zuzentzea eskatzen dizugu.	Atera behar zen frakzioari ez dagokien hondakinak aurkitu arren, jaso egin dira. Mesedez, hurrengorako akatsa zuzentzea eskatzen dizugu.	MZA02	MZA02
16	\N	\N	Organikoa biltzen duen poltsa ez da itxi behar. Mesedez, hurrengorako akatsa zuzentzea eskatzen dizugu.	Organikoa biltzen duen poltsa ez da itxi behar. Mesedez, hurrengorako akatsa zuzentzea eskatzen dizugu.	MZA03	MZA03
17	\N	\N	Hondakinak  ontziaren  barruan atera behar dira. Mesedez, hurrengorako akatsa zuzentzea eskatzen dizugu. Ontzia ez bada moldatzen zure beharretara mesedez jarri gurekin harremanetan.	Hondakinak  ontziaren  barruan atera behar dira. Mesedez, hurrengorako akatsa zuzentzea eskatzen dizugu. Ontzia ez bada moldatzen zure beharretara mesedez jarri gurekin harremanetan.	MZA04	MZA04
18	\N	\N	Hondakinak ez dira jaso behar den egunean atera ez direlako.	Hondakinak ez dira jaso behar den egunean atera ez direlako.	MZA06	MZA06
19	\N	\N	Hondakinak atera dituzun esekitokia ez da dagokizuna.	Hondakinak atera dituzun esekitokia ez da dagokizuna.	MZA07	MZA07
20	\N	\N	Zure ontzia hutsik zegoen.	Zure ontzia hutsik zegoen.	MZA08	MZA08
21	\N	\N	Ontziak ateratzeko erabilitako poltsa ez da zuzena.	Ontziak ateratzeko erabilitako poltsa ez da zuzena.	MZA09	MZA09
22	\N	\N	Hondakinak jaso egin dira beste hondakin mota batzuk ezkutuan aurkitu diren arren. Mankomunitateak zigortu dezake honelako ekintza motak.	Hondakinak jaso egin dira beste hondakin mota batzuk ezkutuan aurkitu diren arren. Mankomunitateak zigortu dezake honelako ekintza motak.	MZA10	MZA10
\.


--
-- Name: PlantillasSms_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"PlantillasSms_id_seq"', 22, true);


--
-- Data for Name: PlantillasTelefono; Type: TABLE DATA; Schema: public; Owner:
--

COPY "PlantillasTelefono" (id, asunto, "esLocFileSize", "esLocMimeType", "esLocBaseName", "euLocFileSize", "euLocMimeType", "euLocBaseName", "esLocCodificadoFileSize", "esLocCodificadoMimeType", "esLocCodificadoBaseName", "euLocCodificadoFileSize", "euLocCodificadoMimeType", "euLocCodificadoBaseName", estado) FROM stdin;
\.


--
-- Name: PlantillasTelefono_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"PlantillasTelefono_id_seq"', 3, true);


--
-- Data for Name: Posicionamiento; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Posicionamiento" ("posicionamientoId", "turnosCamionesId", "precision", "createdOn", fecha, posicion, "posicionAddr", "posicionLng") FROM stdin;
\.


--
-- Name: Posicionamiento_posicionamientoId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Posicionamiento_posicionamientoId_seq"', 1, false);


--
-- Data for Name: Postes; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Postes" ("postesId", "puntosRecogidaId", "postesTiposId", "fechaColocacion", baja, "fechaBaja", "postesIden") FROM stdin;
\.


--
-- Data for Name: PostesTipos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "PostesTipos" ("postesTiposId", columna, capacidad, caras, "marcaPosteId") FROM stdin;
6	20 Posizio V2	20	5	1
7	16 Posizio V2\r\n	16	4	1
8	12 Posizio V2\r\n	12	3	1
9	8 Posizio V2\r\n	8	2	1
10	4 Posizio V2\r\n	4	1	1
11	4 Posizio Paretan\r\n	4	1	1
12	16 Posizio V1\r\n	16	4	2
13	12 Posizio V1\r\n	12	3	2
14	8 Posizio V1\r\n	8	2	2
15	4 Posizio V1\r\n	4	1	2
16	4 Posizio Paretan\r\n	4	1	2
17	12 Posizio V2\r\n	12	3	2
\.


--
-- Name: PostesTipos_postesTiposId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"PostesTipos_postesTiposId_seq"', 17, true);


--
-- Name: Postes_postesId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Postes_postesId_seq"', 17, true);


--
-- Data for Name: PuntosDescarga; Type: TABLE DATA; Schema: public; Owner:
--

COPY "PuntosDescarga" ("puntosDescargaId", "puntosDescargaIden", "residuosTiposId", nombre, descripcion, posicion, "posicionAddr", "posicionLat", "posicionLng") FROM stdin;
\.


--
-- Name: PuntosDescarga_puntosDescargaId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"PuntosDescarga_puntosDescargaId_seq"', 12, true);


--
-- Data for Name: PuntosRecogida; Type: TABLE DATA; Schema: public; Owner:
--

COPY "PuntosRecogida" ("puntosRecogidaId", "puntosRecogidaTiposId", "nombreDescriptivo", "municipioId", barrio, posicion, rfid, "posicionAddr", "posicionLat", "posicionLng", numero, calle) FROM stdin;
\.


--
-- Data for Name: PuntosRecogidaTipos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "PuntosRecogidaTipos" ("puntosRecogidaTiposId", descripcion, nombre) FROM stdin;
5		Ataria
6		Ekarpen Gunea
7		Minigunea
8		Bide Publikoa
9		Esparru Pribatua
10		Karkaba
11		Lokal Publikoak
3		Larrialdi Gunea
4		Esekitoki gunea
\.


--
-- Name: PuntosRecogidaTipos_puntosRecogidaTiposId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"PuntosRecogidaTipos_puntosRecogidaTiposId_seq"', 11, true);


--
-- Name: PuntosRecogida_puntosRecogidaId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"PuntosRecogida_puntosRecogidaId_seq"', 121, true);


--
-- Data for Name: RecogidaTipos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "RecogidaTipos" ("recogidaTiposId", descripcion, nombre) FROM stdin;
3	Atzeko karga kontenerizatua\r\n	BKA
4	Atzeko karga poltsaka\r\n	BKB
5	Alboko bilketa\r\n	BKC
6	Gantxoaren bidezko bilketa\r\n	BKD
7	Poltsaka (ehunkiak)\r\n	BKE
\.


--
-- Name: RecogidaTipos_recogidaTiposId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"RecogidaTipos_recogidaTiposId_seq"', 7, true);


--
-- Data for Name: Recogidas; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Recogidas" (id, "recogidaTipoId", "cuboId", "createdOn", "paradaId", "posteId", "gradoLlenado", "centroEmergenciaId", "puntoRecogidaId", tipos) FROM stdin;
\.


--
-- Name: Recogidas_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Recogidas_id_seq"', 1, false);


--
-- Data for Name: ResiduosTipos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "ResiduosTipos" ("residuosTiposId", descripcion, nombre) FROM stdin;
3		Gai organikoa
4		Ontzi arinak
5		Papera-kartoia
6		Errefusa
7		Kartoi komertziala industriala
8		Hondakin nahasketa
9		Ehunkiak
10		Etxeko Olioa
11		Traste Zaharrak
12		Pilak
\.


--
-- Name: ResiduosTipos_residuosTiposId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"ResiduosTipos_residuosTiposId_seq"', 12, true);


--
-- Data for Name: Revision; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Revision" ("revisionId", "compostadoresId", "fechaHora", "operadorId", observaciones, "revisionTipoId") FROM stdin;
\.


--
-- Data for Name: RevisionTipos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "RevisionTipos" (id, tipo, descripcion) FROM stdin;
\.


--
-- Name: RevisionTipos_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"RevisionTipos_id_seq"', 1, false);


--
-- Name: Revision_revisionId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Revision_revisionId_seq"', 1, false);


--
-- Data for Name: Roles; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Roles" (id, rol, descripcion, "costeHora") FROM stdin;
3	G	Gidaria	0
4	Z	Zamakaria	0
5	GZ	Gidaria-Zamakaria	0
\.


--
-- Name: Roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Roles_id_seq"', 5, true);


--
-- Data for Name: Rutas; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Rutas" ("rutaId", "rutasTiposId", "tiempoAprox", "puntosDescargaId", "residuosTiposId", identificacion) FROM stdin;
\.


--
-- Data for Name: RutasRelPuntosRecogida; Type: TABLE DATA; Schema: public; Owner:
--

COPY "RutasRelPuntosRecogida" (id, "rutaId", "puntosRecogidaId", orden) FROM stdin;
\.


--
-- Name: RutasRelPuntosRecogida_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"RutasRelPuntosRecogida_id_seq"', 111, true);


--
-- Data for Name: RutasTipos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "RutasTipos" ("rutasTiposId", descripcion, nombre) FROM stdin;
8	Bilketa Kontenerizatua / Herritarra / Hirigunean /3200 litroko edukiontzi Laterala	BKHHL3200
7	Bilketa Kontenerizatua / Herritarra / Hirigunean / 2.200 litroko edukiontzi Laterala	BKHHL2200
10	Bilketa Kontenerizatua / Herritarra / Hirigunean / Iglooak	BKHHI
4	Bilketa / Atez Atekoa / Herritarra / Hirigunean / 20 litroko edukiontziak	BAAHH20
3	Bilketa / Atez Atekoa / Herritarra / Hirigunean / 10 litroko edukiontziak	BAAHH10
5	Bilketa / Atez Atekoa / Komertziala / Edonon / Kontenerizatua	BAAKEK
6	Bilketa / Atez Atekoa / Herritarra / Hirigunean / Poltsak	BAAHHP
9	Bilketa / Atez atekoa / Komertziala / Edonon / Eskuz (Kartoi komertziala)	BAAKEE
11	Bilketa / Atez atekoa / Landalurra / Kontenerizatua	BAALK
12	Bilketa / Atez atekoa / Komertziala / Landalurra / Kontenerizatua	BAAKLK
14	Garbiketa / Lavacontenedores / Landalurra / Trasera	GLLT
13	Garbiketa / Hidrolimpiadora / Landalurra / Trasera	GHLT
15	Garbiketa / Lavacontenedores / Hirigunea / Laterala	GLHL
16	Garbiketa / Hidrolimpiadora / Hirigunea / Laterala	GHHL
17	Garbiketa / Hidrolimpiadora / Hirigunea / Hainbat (Esekitokiak, Iglooak, Lurra...)	GHHH
\.


--
-- Name: RutasTipos_rutasTiposId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"RutasTipos_rutasTiposId_seq"', 17, true);


--
-- Name: Rutas_rutaId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Rutas_rutaId_seq"', 3, true);


--
-- Data for Name: Telefonos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Telefonos" ("telefonoId", "contribuyenteId", telefono, tipo, "createdOn") FROM stdin;
\.


--
-- Name: Telefonos_telefonoId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Telefonos_telefonoId_seq"', 29508, true);


--
-- Data for Name: TiposIncidencias; Type: TABLE DATA; Schema: public; Owner:
--

COPY "TiposIncidencias" ("tipoId", descripcion, gravedad, tipo, "resolucionAutomatica", "plantillasEmailId", "plantillasEmailPrioridad", "plantillasSmsId", "plantillasSmsPrioridad", "plantillasTelefonoId", "plantillasTelefonoPrioridad") FROM stdin;
4	Zaborrak lurrean\r\n	moderada	puntoRecogida	f	\N	1	\N	1	\N	1
5	Ontzia apurtuta\r\n	leve	cubo	f	\N	1	\N	1	\N	1
6	Zutabea edota bere ingurua zikina\r\n	grave	puntoRecogida	f	\N	1	\N	1	\N	1
7	Ontziaren etiketa apurtuta\r\n	leve	contribuyente	f	\N	1	\N	1	\N	1
8	Zutabea beretiketatu\r\n	moderada	puntoRecogida	f	\N	1	\N	1	\N	1
9	Zutabea apurtuta\r\n	muy grave	puntoRecogida	f	\N	1	\N	1	\N	1
14	Ontzirik gabe\r\n	muy grave	puntoRecogida	f	\N	1	\N	1	\N	1
20	Ondo dago eta ez da jaso\r\n	grave	camion	f	\N	1	\N	1	\N	1
21	Kartoia gaizki aterata\r\n	grave	contribuyente	f	\N	1	\N	1	\N	1
22	Pisaketa tiket gabe\r\n	grave	camion	f	\N	1	\N	1	\N	1
23	Ezin deskargatu. Ibilgailua apurtuta\r\n	muy grave	camion	f	\N	1	\N	1	\N	1
24	Ezin deskargatu. Arazoa plantan\r\n	muy grave	camion	f	\N	1	\N	1	\N	1
10	Inpropioak. Batu gabe\r\n	muy grave	contribuyente	t	\N	1	\N	1	\N	1
11	Inpropioak. Batuta\r\n	grave	contribuyente	t	\N	1	\N	1	\N	1
12	Poltsa itxita\r\n	grave	contribuyente	t	\N	1	\N	1	\N	1
13	Ontzia gainezka\r\n	moderada	contribuyente	t	\N	1	\N	1	\N	1
15	Ez dagokio egunari\r\n	moderada	contribuyente	t	\N	1	\N	1	\N	1
16	Ez da dagokion esekitokia\r\n	moderada	contribuyente	t	\N	1	\N	1	\N	1
17	Ontzi hutsa\r\n	moderada	contribuyente	t	\N	1	\N	1	\N	1
18	Ez da poltsa aproposa\r\n	leve	contribuyente	t	\N	1	\N	1	\N	1
19	Inpropioak disimulatuta\r\n	muy grave	contribuyente	t	\N	1	\N	1	\N	1
\.


--
-- Name: TiposIncidencias_tipoId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"TiposIncidencias_tipoId_seq"', 24, true);


--
-- Data for Name: Turnos; Type: TABLE DATA; Schema: public; Owner:
--

COPY "Turnos" ("turnoId", "rutaId", fecha, "horaInicio", "horaFinal") FROM stdin;
\.


--
-- Data for Name: TurnosCamionesRelOperarios; Type: TABLE DATA; Schema: public; Owner:
--

COPY "TurnosCamionesRelOperarios" (id, "turnosRelCamionesId", "operarioId") FROM stdin;
\.


--
-- Name: TurnosCamionesRelOperarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"TurnosCamionesRelOperarios_id_seq"', 1, false);


--
-- Data for Name: TurnosRelCamiones; Type: TABLE DATA; Schema: public; Owner:
--

COPY "TurnosRelCamiones" (id, "turnoId", "camionesId", orden, "origenPuntoRecogidaId", "tabletId") FROM stdin;
\.


--
-- Name: TurnosRelCamiones_id_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"TurnosRelCamiones_id_seq"', 1, false);


--
-- Name: Turnos_turnoId_seq; Type: SEQUENCE SET; Schema: public; Owner:
--

SELECT pg_catalog.setval('"Turnos_turnoId_seq"', 1, true);


--
-- Data for Name: spatial_ref_sys; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY spatial_ref_sys  FROM stdin;
\.


--
-- Name: Camiones_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Camiones"
    ADD CONSTRAINT "Camiones_pkey" PRIMARY KEY ("camionId");


--
-- Name: CentrosEmergencia_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CentrosEmergencia"
    ADD CONSTRAINT "CentrosEmergencia_pkey" PRIMARY KEY (id);


--
-- Name: CodigosAperturaPrivados_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosAperturaPrivados"
    ADD CONSTRAINT "CodigosAperturaPrivados_pkey" PRIMARY KEY (id);


--
-- Name: CodigosApertura_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosApertura"
    ADD CONSTRAINT "CodigosApertura_pkey" PRIMARY KEY (id);


--
-- Name: CodigosPostales_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosPostales"
    ADD CONSTRAINT "CodigosPostales_pkey" PRIMARY KEY (id);


--
-- Name: CompostadoresRelContribuyentes_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CompostadoresRelContribuyentes"
    ADD CONSTRAINT "CompostadoresRelContribuyentes_pkey" PRIMARY KEY ("idRel");


--
-- Name: Compostadores_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Compostadores"
    ADD CONSTRAINT "Compostadores_pkey" PRIMARY KEY ("compostadoresId");


--
-- Name: Contribuyentes_contribuyenteIden_key; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Contribuyentes"
    ADD CONSTRAINT "Contribuyentes_contribuyenteIden_key" UNIQUE ("contribuyenteIden");


--
-- Name: Contribuyentes_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Contribuyentes"
    ADD CONSTRAINT "Contribuyentes_pkey" PRIMARY KEY ("contribuyenteId");


--
-- Name: CubosImportadores_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CubosImportadores"
    ADD CONSTRAINT "CubosImportadores_pkey" PRIMARY KEY (id);


--
-- Name: CubosTipos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CubosTipos"
    ADD CONSTRAINT "CubosTipos_pkey" PRIMARY KEY ("cubosTiposId");


--
-- Name: Cubos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Cubos"
    ADD CONSTRAINT "Cubos_pkey" PRIMARY KEY ("cuboId");


--
-- Name: Descargas_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Descargas"
    ADD CONSTRAINT "Descargas_pkey" PRIMARY KEY (id);


--
-- Name: Dispositivos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Dispositivos"
    ADD CONSTRAINT "Dispositivos_pkey" PRIMARY KEY (id);


--
-- Name: Emails_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Emails"
    ADD CONSTRAINT "Emails_pkey" PRIMARY KEY ("emailId");


--
-- Name: FileAccess_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "FileAccess"
    ADD CONSTRAINT "FileAccess_pkey" PRIMARY KEY (id);


--
-- Name: Importadores_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Importadores"
    ADD CONSTRAINT "Importadores_pkey" PRIMARY KEY (id);


--
-- Name: Incidencias_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_pkey" PRIMARY KEY ("incidenciaId");


--
-- Name: KlearRolesSections_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearRolesSections"
    ADD CONSTRAINT "KlearRolesSections_pkey" PRIMARY KEY (id);


--
-- Name: KlearRoles_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearRoles"
    ADD CONSTRAINT "KlearRoles_pkey" PRIMARY KEY (id);


--
-- Name: KlearSections_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearSections"
    ADD CONSTRAINT "KlearSections_pkey" PRIMARY KEY (id);


--
-- Name: KlearUsersRoles_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsersRoles"
    ADD CONSTRAINT "KlearUsersRoles_pkey" PRIMARY KEY (id);


--
-- Name: KlearUsers_email_key; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsers"
    ADD CONSTRAINT "KlearUsers_email_key" UNIQUE (email);


--
-- Name: KlearUsers_login_key; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsers"
    ADD CONSTRAINT "KlearUsers_login_key" UNIQUE (login);


--
-- Name: KlearUsers_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsers"
    ADD CONSTRAINT "KlearUsers_pkey" PRIMARY KEY ("userId");


--
-- Name: Llamadas_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogLlamadas"
    ADD CONSTRAINT "Llamadas_pkey" PRIMARY KEY ("llamadasId");


--
-- Name: Locuciones_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Locuciones"
    ADD CONSTRAINT "Locuciones_pkey" PRIMARY KEY (id);


--
-- Name: MarcasCompostador_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasCompostador"
    ADD CONSTRAINT "MarcasCompostador_pkey" PRIMARY KEY (id);


--
-- Name: MarcasCubo_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasCubo"
    ADD CONSTRAINT "MarcasCubo_pkey" PRIMARY KEY (id);


--
-- Name: MarcasDispositivo_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasDispositivo"
    ADD CONSTRAINT "MarcasDispositivo_pkey" PRIMARY KEY (id);


--
-- Name: MarcasPoste_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MarcasPoste"
    ADD CONSTRAINT "MarcasPoste_pkey" PRIMARY KEY (id);


--
-- Name: MunicipiosRelCercania_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCercania"
    ADD CONSTRAINT "MunicipiosRelCercania_pkey" PRIMARY KEY (id);


--
-- Name: MunicipiosRelCodigosPostales_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCodigosPostales"
    ADD CONSTRAINT "MunicipiosRelCodigosPostales_pkey" PRIMARY KEY (id);


--
-- Name: Municipios_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Municipios"
    ADD CONSTRAINT "Municipios_pkey" PRIMARY KEY ("municipioId");


--
-- Name: Operarios_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Operarios"
    ADD CONSTRAINT "Operarios_pkey" PRIMARY KEY ("operarioId");


--
-- Name: Paradas_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Paradas"
    ADD CONSTRAINT "Paradas_pkey" PRIMARY KEY ("paradaId");


--
-- Name: PlantillasEmail_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PlantillasEmail"
    ADD CONSTRAINT "PlantillasEmail_pkey" PRIMARY KEY (id);


--
-- Name: PlantillasSms_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PlantillasSms"
    ADD CONSTRAINT "PlantillasSms_pkey" PRIMARY KEY (id);


--
-- Name: PlantillasTelefono_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PlantillasTelefono"
    ADD CONSTRAINT "PlantillasTelefono_pkey" PRIMARY KEY (id);


--
-- Name: Posicionamiento_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Posicionamiento"
    ADD CONSTRAINT "Posicionamiento_pkey" PRIMARY KEY ("posicionamientoId");


--
-- Name: PostesTipos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PostesTipos"
    ADD CONSTRAINT "PostesTipos_pkey" PRIMARY KEY ("postesTiposId");


--
-- Name: Postes_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Postes"
    ADD CONSTRAINT "Postes_pkey" PRIMARY KEY ("postesId");


--
-- Name: PuntosDescarga_PuntosDescargaIden_key; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosDescarga"
    ADD CONSTRAINT "PuntosDescarga_PuntosDescargaIden_key" UNIQUE ("puntosDescargaIden");


--
-- Name: PuntosDescarga_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosDescarga"
    ADD CONSTRAINT "PuntosDescarga_pkey" PRIMARY KEY ("puntosDescargaId");


--
-- Name: PuntosRecogidaTipos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosRecogidaTipos"
    ADD CONSTRAINT "PuntosRecogidaTipos_pkey" PRIMARY KEY ("puntosRecogidaTiposId");


--
-- Name: PuntosRecogida_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosRecogida"
    ADD CONSTRAINT "PuntosRecogida_pkey" PRIMARY KEY ("puntosRecogidaId");


--
-- Name: RecogidaTipos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "RecogidaTipos"
    ADD CONSTRAINT "RecogidaTipos_pkey" PRIMARY KEY ("recogidaTiposId");


--
-- Name: Recogidas_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas"
    ADD CONSTRAINT "Recogidas_pkey" PRIMARY KEY (id);


--
-- Name: ResiduosTipos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "ResiduosTipos"
    ADD CONSTRAINT "ResiduosTipos_pkey" PRIMARY KEY ("residuosTiposId");


--
-- Name: RevisionTipos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "RevisionTipos"
    ADD CONSTRAINT "RevisionTipos_pkey" PRIMARY KEY (id);


--
-- Name: Revision_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Revision"
    ADD CONSTRAINT "Revision_pkey" PRIMARY KEY ("revisionId");


--
-- Name: Roles_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Roles"
    ADD CONSTRAINT "Roles_pkey" PRIMARY KEY (id);


--
-- Name: RutasRelPuntosRecogida_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "RutasRelPuntosRecogida"
    ADD CONSTRAINT "RutasRelPuntosRecogida_pkey" PRIMARY KEY (id);


--
-- Name: RutasTipos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "RutasTipos"
    ADD CONSTRAINT "RutasTipos_pkey" PRIMARY KEY ("rutasTiposId");


--
-- Name: Rutas_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Rutas"
    ADD CONSTRAINT "Rutas_pkey" PRIMARY KEY ("rutaId");


--
-- Name: SmsMensajes_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogSms"
    ADD CONSTRAINT "SmsMensajes_pkey" PRIMARY KEY ("smsMensajeId");


--
-- Name: Telefonos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Telefonos"
    ADD CONSTRAINT "Telefonos_pkey" PRIMARY KEY ("telefonoId");


--
-- Name: TiposIncidencias_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TiposIncidencias"
    ADD CONSTRAINT "TiposIncidencias_pkey" PRIMARY KEY ("tipoId");


--
-- Name: TurnosCamionesRelOperarios_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosCamionesRelOperarios"
    ADD CONSTRAINT "TurnosCamionesRelOperarios_pkey" PRIMARY KEY (id);


--
-- Name: TurnosRelCamiones_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosRelCamiones"
    ADD CONSTRAINT "TurnosRelCamiones_pkey" PRIMARY KEY (id);


--
-- Name: Turnos_pkey; Type: CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Turnos"
    ADD CONSTRAINT "Turnos_pkey" PRIMARY KEY ("turnoId");


--
-- Name: CentrosEmergencia_puntoRecogidaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CentrosEmergencia_puntoRecogidaId_idx" ON "CentrosEmergencia" USING btree ("puntoRecogidaId");


--
-- Name: CodigosAperturaPrivados_contribuyenteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CodigosAperturaPrivados_contribuyenteId_idx" ON "CodigosAperturaPrivados" USING btree ("contribuyenteId");


--
-- Name: CodigosAperturaPrivados_municipioId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CodigosAperturaPrivados_municipioId_idx" ON "CodigosAperturaPrivados" USING btree ("municipioId");


--
-- Name: CodigosApertura_centroEmergenciaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CodigosApertura_centroEmergenciaId_idx" ON "CodigosApertura" USING btree ("centroEmergenciaId");


--
-- Name: CodigosApertura_contribuyenteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CodigosApertura_contribuyenteId_idx" ON "CodigosApertura" USING btree ("contribuyenteId");


--
-- Name: CodigosApertura_municipioId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CodigosApertura_municipioId_idx" ON "CodigosApertura" USING btree ("municipioId");


--
-- Name: CompostadoresRelContribuyentes_compostadoresId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CompostadoresRelContribuyentes_compostadoresId_idx" ON "CompostadoresRelContribuyentes" USING btree ("compostadoresId");


--
-- Name: CompostadoresRelContribuyentes_contribuyenteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CompostadoresRelContribuyentes_contribuyenteId_idx" ON "CompostadoresRelContribuyentes" USING btree ("contribuyenteId");


--
-- Name: Compostadores_marcaCompostadorId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Compostadores_marcaCompostadorId_idx" ON "Compostadores" USING btree ("marcaCompostadorId");


--
-- Name: Contribuyentes_municipioId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Contribuyentes_municipioId_idx" ON "Contribuyentes" USING btree ("municipioId");


--
-- Name: CubosTipos_marcaCuboId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "CubosTipos_marcaCuboId_idx" ON "CubosTipos" USING btree ("marcaCuboId");


--
-- Name: Cubos_contribuyenteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Cubos_contribuyenteId_idx" ON "Cubos" USING btree ("contribuyenteId");


--
-- Name: Cubos_cubosTiposId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Cubos_cubosTiposId_idx" ON "Cubos" USING btree ("cubosTiposId");


--
-- Name: Cubos_posteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Cubos_posteId_idx" ON "Cubos" USING btree ("posteId");


--
-- Name: Descargas_camionId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Descargas_camionId_idx" ON "Descargas" USING btree ("camionId");


--
-- Name: Descargas_puntoDescargaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Descargas_puntoDescargaId_idx" ON "Descargas" USING btree ("puntoDescargaId");


--
-- Name: Dispositivos_marcaDispositivoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Dispositivos_marcaDispositivoId_idx" ON "Dispositivos" USING btree ("marcaDispositivoId");


--
-- Name: EmailsMensajes_incidenciaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "EmailsMensajes_incidenciaId_idx" ON "LogEmails" USING btree ("incidenciaId");


--
-- Name: Emails_contribuyenteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Emails_contribuyenteId_idx" ON "Emails" USING btree ("contribuyenteId");


--
-- Name: Incidencias_compostadorId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_compostadorId_idx" ON "Incidencias" USING btree ("compostadorId");


--
-- Name: Incidencias_contribuyenteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_contribuyenteId_idx" ON "Incidencias" USING btree ("contribuyenteId");


--
-- Name: Incidencias_cuboId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_cuboId_idx" ON "Incidencias" USING btree ("cuboId");


--
-- Name: Incidencias_postesId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_postesId_idx" ON "Incidencias" USING btree ("postesId");


--
-- Name: Incidencias_puntoRecogidaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_puntoRecogidaId_idx" ON "Incidencias" USING btree ("puntoRecogidaId");


--
-- Name: Incidencias_recogidasId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_recogidasId_idx" ON "Incidencias" USING btree ("paradaId");


--
-- Name: Incidencias_tipoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_tipoId_idx" ON "Incidencias" USING btree ("tipoId");


--
-- Name: Incidencias_turnoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Incidencias_turnoId_idx" ON "Incidencias" USING btree ("camionId");


--
-- Name: KlearRolesSections_klearRoleId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "KlearRolesSections_klearRoleId_idx" ON "KlearRolesSections" USING btree ("klearRoleId");


--
-- Name: KlearRolesSections_klearSectionId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "KlearRolesSections_klearSectionId_idx" ON "KlearRolesSections" USING btree ("klearSectionId");


--
-- Name: KlearRoles_identifier_idx; Type: INDEX; Schema: public; Owner:
--

CREATE UNIQUE INDEX "KlearRoles_identifier_idx" ON "KlearRoles" USING btree (identifier);


--
-- Name: KlearSections_identifier_idx; Type: INDEX; Schema: public; Owner:
--

CREATE UNIQUE INDEX "KlearSections_identifier_idx" ON "KlearSections" USING btree (identifier);


--
-- Name: KlearUsersRoles_klearRoleId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "KlearUsersRoles_klearRoleId_idx" ON "KlearUsersRoles" USING btree ("klearRoleId");


--
-- Name: KlearUsersRoles_klearUserId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "KlearUsersRoles_klearUserId_idx" ON "KlearUsersRoles" USING btree ("klearUserId");


--
-- Name: Llamadas_incidenciaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Llamadas_incidenciaId_idx" ON "LogLlamadas" USING btree ("incidenciaId");


--
-- Name: Llamadas_plantillasTelefonoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Llamadas_plantillasTelefonoId_idx" ON "LogLlamadas" USING btree ("plantillasTelefonoId");


--
-- Name: MunicipiosRelCercania_municipioCercanoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "MunicipiosRelCercania_municipioCercanoId_idx" ON "MunicipiosRelCercania" USING btree ("municipioCercanoId");


--
-- Name: MunicipiosRelCercania_municipioId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "MunicipiosRelCercania_municipioId_idx" ON "MunicipiosRelCercania" USING btree ("municipioId");


--
-- Name: MunicipiosRelCodigosPostales_codigoPostalId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "MunicipiosRelCodigosPostales_codigoPostalId_idx" ON "MunicipiosRelCodigosPostales" USING btree ("codigoPostalId");


--
-- Name: MunicipiosRelCodigosPostales_municipioId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "MunicipiosRelCodigosPostales_municipioId_idx" ON "MunicipiosRelCodigosPostales" USING btree ("municipioId");


--
-- Name: Operarios_rolId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Operarios_rolId_idx" ON "Operarios" USING btree ("rolId");


--
-- Name: Paradas_puntosRecogidasId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Paradas_puntosRecogidasId_idx" ON "Paradas" USING btree ("puntosRecogidasId");


--
-- Name: Paradas_turnosCamionesId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Paradas_turnosCamionesId_idx" ON "Paradas" USING btree ("turnosCamionesId");


--
-- Name: Posicionamiento_turnosCamionesId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Posicionamiento_turnosCamionesId_idx" ON "Posicionamiento" USING btree ("turnosCamionesId");


--
-- Name: PostesTipos_marcaPosteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "PostesTipos_marcaPosteId_idx" ON "PostesTipos" USING btree ("marcaPosteId");


--
-- Name: Postes_postesTiposId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Postes_postesTiposId_idx" ON "Postes" USING btree ("postesTiposId");


--
-- Name: Postes_puntosRecogidaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Postes_puntosRecogidaId_idx" ON "Postes" USING btree ("puntosRecogidaId");


--
-- Name: PuntosDescarga_residuosTiposId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "PuntosDescarga_residuosTiposId_idx" ON "PuntosDescarga" USING btree ("residuosTiposId");


--
-- Name: PuntosRecogida_municipioId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "PuntosRecogida_municipioId_idx" ON "PuntosRecogida" USING btree ("municipioId");


--
-- Name: PuntosRecogida_puntosRecogidaTiposId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "PuntosRecogida_puntosRecogidaTiposId_idx" ON "PuntosRecogida" USING btree ("puntosRecogidaTiposId");


--
-- Name: Recogidas_RecogidaTiposId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Recogidas_RecogidaTiposId_idx" ON "Recogidas" USING btree ("recogidaTipoId");


--
-- Name: Recogidas_centroEmergenciaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Recogidas_centroEmergenciaId_idx" ON "Recogidas" USING btree ("centroEmergenciaId");


--
-- Name: Recogidas_cuboId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Recogidas_cuboId_idx" ON "Recogidas" USING btree ("cuboId");


--
-- Name: Recogidas_paradaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Recogidas_paradaId_idx" ON "Recogidas" USING btree ("paradaId");


--
-- Name: Recogidas_postesId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Recogidas_postesId_idx" ON "Recogidas" USING btree ("posteId");


--
-- Name: Recogidas_puntoRecogidaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Recogidas_puntoRecogidaId_idx" ON "Recogidas" USING btree ("puntoRecogidaId");


--
-- Name: Recogidas_rutaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Recogidas_rutaId_idx" ON "Recogidas" USING btree ("paradaId");


--
-- Name: Revision_compostadoresId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Revision_compostadoresId_idx" ON "Revision" USING btree ("compostadoresId");


--
-- Name: Revision_operadorId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Revision_operadorId_idx" ON "Revision" USING btree ("operadorId");


--
-- Name: Revision_revisionTipoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Revision_revisionTipoId_idx" ON "Revision" USING btree ("revisionTipoId");


--
-- Name: RutasRelPuntosRecogida_puntosRecogidaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "RutasRelPuntosRecogida_puntosRecogidaId_idx" ON "RutasRelPuntosRecogida" USING btree ("puntosRecogidaId");


--
-- Name: RutasRelPuntosRecogida_rutaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "RutasRelPuntosRecogida_rutaId_idx" ON "RutasRelPuntosRecogida" USING btree ("rutaId");


--
-- Name: Rutas_puntosDescargaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Rutas_puntosDescargaId_idx" ON "Rutas" USING btree ("puntosDescargaId");


--
-- Name: Rutas_residuosTiposId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Rutas_residuosTiposId_idx" ON "Rutas" USING btree ("residuosTiposId");


--
-- Name: Rutas_rutasTiposId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Rutas_rutasTiposId_idx" ON "Rutas" USING btree ("rutasTiposId");


--
-- Name: SmsMensajes_incidenciaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "SmsMensajes_incidenciaId_idx" ON "LogSms" USING btree ("incidenciaId");


--
-- Name: SmsMensajes_plantillasSmsId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "SmsMensajes_plantillasSmsId_idx" ON "LogSms" USING btree ("plantillasSmsId");


--
-- Name: Telefonos_contribuyenteId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Telefonos_contribuyenteId_idx" ON "Telefonos" USING btree ("contribuyenteId");


--
-- Name: TiposIncidencias_plantillasEmailId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TiposIncidencias_plantillasEmailId_idx" ON "TiposIncidencias" USING btree ("plantillasEmailId");


--
-- Name: TiposIncidencias_plantillasSmsId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TiposIncidencias_plantillasSmsId_idx" ON "TiposIncidencias" USING btree ("plantillasSmsId");


--
-- Name: TiposIncidencias_plantillasTelefonoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TiposIncidencias_plantillasTelefonoId_idx" ON "TiposIncidencias" USING btree ("plantillasTelefonoId");


--
-- Name: TurnosCamionesRelOperarios_operarioId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TurnosCamionesRelOperarios_operarioId_idx" ON "TurnosCamionesRelOperarios" USING btree ("operarioId");


--
-- Name: TurnosCamionesRelOperarios_turnosRelCamionesId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TurnosCamionesRelOperarios_turnosRelCamionesId_idx" ON "TurnosCamionesRelOperarios" USING btree ("turnosRelCamionesId");


--
-- Name: TurnosRelCamiones_camionesId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TurnosRelCamiones_camionesId_idx" ON "TurnosRelCamiones" USING btree ("camionesId");


--
-- Name: TurnosRelCamiones_origenPuntoRecogidaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TurnosRelCamiones_origenPuntoRecogidaId_idx" ON "TurnosRelCamiones" USING btree ("origenPuntoRecogidaId");


--
-- Name: TurnosRelCamiones_tabletId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TurnosRelCamiones_tabletId_idx" ON "TurnosRelCamiones" USING btree ("tabletId");


--
-- Name: TurnosRelCamiones_turnoId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "TurnosRelCamiones_turnoId_idx" ON "TurnosRelCamiones" USING btree ("turnoId");


--
-- Name: Turnos_rutaId_idx; Type: INDEX; Schema: public; Owner:
--

CREATE INDEX "Turnos_rutaId_idx" ON "Turnos" USING btree ("rutaId");


--
-- Name: postesiden_uniq; Type: INDEX; Schema: public; Owner:
--

CREATE UNIQUE INDEX postesiden_uniq ON "Postes" USING btree ("postesIden");


--
-- Name: CentrosEmergencia_puntoRecogidaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CentrosEmergencia"
    ADD CONSTRAINT "CentrosEmergencia_puntoRecogidaId_fkey" FOREIGN KEY ("puntoRecogidaId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE CASCADE;


--
-- Name: CodigosAperturaPrivados_contribuyenteId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosAperturaPrivados"
    ADD CONSTRAINT "CodigosAperturaPrivados_contribuyenteId_fkey" FOREIGN KEY ("contribuyenteId") REFERENCES "Contribuyentes"("contribuyenteId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: CodigosAperturaPrivados_municipioId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosAperturaPrivados"
    ADD CONSTRAINT "CodigosAperturaPrivados_municipioId_fkey" FOREIGN KEY ("municipioId") REFERENCES "Municipios"("municipioId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: CodigosApertura_centroEmergenciaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosApertura"
    ADD CONSTRAINT "CodigosApertura_centroEmergenciaId_fkey" FOREIGN KEY ("centroEmergenciaId") REFERENCES "CentrosEmergencia"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: CodigosApertura_contribuyenteId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosApertura"
    ADD CONSTRAINT "CodigosApertura_contribuyenteId_fkey" FOREIGN KEY ("contribuyenteId") REFERENCES "Contribuyentes"("contribuyenteId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: CodigosApertura_municipioId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CodigosApertura"
    ADD CONSTRAINT "CodigosApertura_municipioId_fkey" FOREIGN KEY ("municipioId") REFERENCES "Municipios"("municipioId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: CompostadoresRelContribuyentes_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CompostadoresRelContribuyentes"
    ADD CONSTRAINT "CompostadoresRelContribuyentes_ibfk_1" FOREIGN KEY ("contribuyenteId") REFERENCES "Contribuyentes"("contribuyenteId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: CompostadoresRelContribuyentes_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CompostadoresRelContribuyentes"
    ADD CONSTRAINT "CompostadoresRelContribuyentes_ibfk_2" FOREIGN KEY ("compostadoresId") REFERENCES "Compostadores"("compostadoresId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Compostadores_marcaCompostadorId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Compostadores"
    ADD CONSTRAINT "Compostadores_marcaCompostadorId_fkey" FOREIGN KEY ("marcaCompostadorId") REFERENCES "MarcasCompostador"(id) ON UPDATE CASCADE;


--
-- Name: CubosTipos_marcaCuboId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "CubosTipos"
    ADD CONSTRAINT "CubosTipos_marcaCuboId_fkey" FOREIGN KEY ("marcaCuboId") REFERENCES "MarcasCubo"(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Cubos_centrosEmergenciaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Cubos"
    ADD CONSTRAINT "Cubos_centrosEmergenciaId_fkey" FOREIGN KEY ("centrosEmergenciaId") REFERENCES "CentrosEmergencia"(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Cubos_posteId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Cubos"
    ADD CONSTRAINT "Cubos_posteId_fkey" FOREIGN KEY ("posteId") REFERENCES "Postes"("postesId") ON UPDATE SET NULL;


--
-- Name: Cubos_puntosRecogidaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Cubos"
    ADD CONSTRAINT "Cubos_puntosRecogidaId_fkey" FOREIGN KEY ("puntosRecogidaId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE SET NULL;


--
-- Name: Descargas_camionId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Descargas"
    ADD CONSTRAINT "Descargas_camionId_fkey" FOREIGN KEY ("camionId") REFERENCES "Camiones"("camionId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Descargas_puntoDescargaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Descargas"
    ADD CONSTRAINT "Descargas_puntoDescargaId_fkey" FOREIGN KEY ("puntoDescargaId") REFERENCES "PuntosDescarga"("puntosDescargaId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Dispositivos_marcaDispositivoId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Dispositivos"
    ADD CONSTRAINT "Dispositivos_marcaDispositivoId_fkey" FOREIGN KEY ("marcaDispositivoId") REFERENCES "MarcasDispositivo"(id) ON UPDATE CASCADE;


--
-- Name: EmailsMensajes_incidenciaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogEmails"
    ADD CONSTRAINT "EmailsMensajes_incidenciaId_fkey" FOREIGN KEY ("incidenciaId") REFERENCES "Incidencias"("incidenciaId");


--
-- Name: EmailsMensajes_pkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogEmails"
    ADD CONSTRAINT "EmailsMensajes_pkey" FOREIGN KEY ("incidenciaId") REFERENCES "Incidencias"("incidenciaId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Incidencias_camionId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_camionId_fkey" FOREIGN KEY ("camionId") REFERENCES "Camiones"("camionId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Incidencias_compostadorId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_compostadorId_fkey" FOREIGN KEY ("compostadorId") REFERENCES "Compostadores"("compostadoresId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Incidencias_contribuyenteId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_contribuyenteId_fkey" FOREIGN KEY ("contribuyenteId") REFERENCES "Contribuyentes"("contribuyenteId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Incidencias_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_ibfk_1" FOREIGN KEY ("cuboId") REFERENCES "Cubos"("cuboId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Incidencias_paradaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_paradaId_fkey" FOREIGN KEY ("paradaId") REFERENCES "Paradas"("paradaId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Incidencias_puntoRecogidaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_puntoRecogidaId_fkey" FOREIGN KEY ("puntoRecogidaId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Incidencias_tipoId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT "Incidencias_tipoId_fkey" FOREIGN KEY ("tipoId") REFERENCES "TiposIncidencias"("tipoId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: KlearRolesSections_klearRoleId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearRolesSections"
    ADD CONSTRAINT "KlearRolesSections_klearRoleId_fkey" FOREIGN KEY ("klearRoleId") REFERENCES "KlearRoles"(id) ON DELETE CASCADE;


--
-- Name: KlearRolesSections_klearSectionId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearRolesSections"
    ADD CONSTRAINT "KlearRolesSections_klearSectionId_fkey" FOREIGN KEY ("klearSectionId") REFERENCES "KlearSections"(id) ON DELETE CASCADE;


--
-- Name: KlearUsersRoles_klearRoleId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsersRoles"
    ADD CONSTRAINT "KlearUsersRoles_klearRoleId_fkey" FOREIGN KEY ("klearRoleId") REFERENCES "KlearRoles"(id) ON DELETE CASCADE;


--
-- Name: KlearUsersRoles_klearUserId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "KlearUsersRoles"
    ADD CONSTRAINT "KlearUsersRoles_klearUserId_fkey" FOREIGN KEY ("klearUserId") REFERENCES "KlearUsers"("userId") ON DELETE CASCADE;


--
-- Name: Llamadas_ibfk_3; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogLlamadas"
    ADD CONSTRAINT "Llamadas_ibfk_3" FOREIGN KEY ("incidenciaId") REFERENCES "Incidencias"("incidenciaId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Llamadas_plantillasTelefonoId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogLlamadas"
    ADD CONSTRAINT "Llamadas_plantillasTelefonoId_fkey" FOREIGN KEY ("plantillasTelefonoId") REFERENCES "PlantillasTelefono"(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: MunicipiosRelCercania_municipioId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCercania"
    ADD CONSTRAINT "MunicipiosRelCercania_municipioId_fkey" FOREIGN KEY ("municipioId") REFERENCES "Municipios"("municipioId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: MunicipiosRelCercania_municipioId_fkey1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCercania"
    ADD CONSTRAINT "MunicipiosRelCercania_municipioId_fkey1" FOREIGN KEY ("municipioId") REFERENCES "Municipios"("municipioId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: MunicipiosRelCodigosPostales_codigoPostalId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCodigosPostales"
    ADD CONSTRAINT "MunicipiosRelCodigosPostales_codigoPostalId_fkey" FOREIGN KEY ("codigoPostalId") REFERENCES "CodigosPostales"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: MunicipiosRelCodigosPostales_municipioId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "MunicipiosRelCodigosPostales"
    ADD CONSTRAINT "MunicipiosRelCodigosPostales_municipioId_fkey" FOREIGN KEY ("municipioId") REFERENCES "Municipios"("municipioId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Operarios_rolId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Operarios"
    ADD CONSTRAINT "Operarios_rolId_fkey" FOREIGN KEY ("rolId") REFERENCES "Roles"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Paradas_puntosRecogidasId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Paradas"
    ADD CONSTRAINT "Paradas_puntosRecogidasId_fkey" FOREIGN KEY ("puntosRecogidasId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Paradas_turnosCamionesId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Paradas"
    ADD CONSTRAINT "Paradas_turnosCamionesId_fkey" FOREIGN KEY ("turnosCamionesId") REFERENCES "TurnosRelCamiones"(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Posicionamiento_turnosCamionesId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Posicionamiento"
    ADD CONSTRAINT "Posicionamiento_turnosCamionesId_fkey" FOREIGN KEY ("turnosCamionesId") REFERENCES "TurnosRelCamiones"(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: PostesTipos_marcaPosteId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PostesTipos"
    ADD CONSTRAINT "PostesTipos_marcaPosteId_fkey" FOREIGN KEY ("marcaPosteId") REFERENCES "MarcasPoste"(id) ON UPDATE CASCADE;


--
-- Name: PuntosRecogida_municipioId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosRecogida"
    ADD CONSTRAINT "PuntosRecogida_municipioId_fkey" FOREIGN KEY ("municipioId") REFERENCES "Municipios"("municipioId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Recogidas_centroEmergenciaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas"
    ADD CONSTRAINT "Recogidas_centroEmergenciaId_fkey" FOREIGN KEY ("centroEmergenciaId") REFERENCES "CentrosEmergencia"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: Recogidas_paradaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas"
    ADD CONSTRAINT "Recogidas_paradaId_fkey" FOREIGN KEY ("paradaId") REFERENCES "Paradas"("paradaId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Recogidas_postesId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas"
    ADD CONSTRAINT "Recogidas_postesId_fkey" FOREIGN KEY ("posteId") REFERENCES "Postes"("postesId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Recogidas_puntoRecogidaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas"
    ADD CONSTRAINT "Recogidas_puntoRecogidaId_fkey" FOREIGN KEY ("puntoRecogidaId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Revision_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Revision"
    ADD CONSTRAINT "Revision_ibfk_1" FOREIGN KEY ("compostadoresId") REFERENCES "Compostadores"("compostadoresId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Revision_operadorId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Revision"
    ADD CONSTRAINT "Revision_operadorId_fkey" FOREIGN KEY ("operadorId") REFERENCES "Operarios"("operarioId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Revision_revisionTipoId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Revision"
    ADD CONSTRAINT "Revision_revisionTipoId_fkey" FOREIGN KEY ("revisionTipoId") REFERENCES "RevisionTipos"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: RutasRelPuntosRecogida_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "RutasRelPuntosRecogida"
    ADD CONSTRAINT "RutasRelPuntosRecogida_ibfk_1" FOREIGN KEY ("rutaId") REFERENCES "Rutas"("rutaId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: RutasRelPuntosRecogida_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "RutasRelPuntosRecogida"
    ADD CONSTRAINT "RutasRelPuntosRecogida_ibfk_2" FOREIGN KEY ("puntosRecogidaId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Rutas_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Rutas"
    ADD CONSTRAINT "Rutas_ibfk_1" FOREIGN KEY ("rutasTiposId") REFERENCES "RutasTipos"("rutasTiposId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Rutas_puntosDescargaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Rutas"
    ADD CONSTRAINT "Rutas_puntosDescargaId_fkey" FOREIGN KEY ("puntosDescargaId") REFERENCES "PuntosDescarga"("puntosDescargaId") ON UPDATE CASCADE;


--
-- Name: Rutas_residuosTiposId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Rutas"
    ADD CONSTRAINT "Rutas_residuosTiposId_fkey" FOREIGN KEY ("residuosTiposId") REFERENCES "ResiduosTipos"("residuosTiposId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: SmsMensajes_incidenciaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogSms"
    ADD CONSTRAINT "SmsMensajes_incidenciaId_fkey" FOREIGN KEY ("incidenciaId") REFERENCES "Incidencias"("incidenciaId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: SmsMensajes_plantillasSmsId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "LogSms"
    ADD CONSTRAINT "SmsMensajes_plantillasSmsId_fkey" FOREIGN KEY ("plantillasSmsId") REFERENCES "PlantillasSms"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: TiposIncidencias_plantillasEmailId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TiposIncidencias"
    ADD CONSTRAINT "TiposIncidencias_plantillasEmailId_fkey" FOREIGN KEY ("plantillasEmailId") REFERENCES "PlantillasEmail"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TiposIncidencias_plantillasSmsId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TiposIncidencias"
    ADD CONSTRAINT "TiposIncidencias_plantillasSmsId_fkey" FOREIGN KEY ("plantillasSmsId") REFERENCES "PlantillasSms"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TiposIncidencias_plantillasTelefonoId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TiposIncidencias"
    ADD CONSTRAINT "TiposIncidencias_plantillasTelefonoId_fkey" FOREIGN KEY ("plantillasTelefonoId") REFERENCES "PlantillasTelefono"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TurnosCamionesRelOperarios_operarioId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosCamionesRelOperarios"
    ADD CONSTRAINT "TurnosCamionesRelOperarios_operarioId_fkey" FOREIGN KEY ("operarioId") REFERENCES "Operarios"("operarioId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: TurnosCamionesRelOperarios_turnosRelCamionesId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosCamionesRelOperarios"
    ADD CONSTRAINT "TurnosCamionesRelOperarios_turnosRelCamionesId_fkey" FOREIGN KEY ("turnosRelCamionesId") REFERENCES "TurnosRelCamiones"(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: TurnosRelCamiones_camionesId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosRelCamiones"
    ADD CONSTRAINT "TurnosRelCamiones_camionesId_fkey" FOREIGN KEY ("camionesId") REFERENCES "Camiones"("camionId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: TurnosRelCamiones_origenPuntoRecogidaId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosRelCamiones"
    ADD CONSTRAINT "TurnosRelCamiones_origenPuntoRecogidaId_fkey" FOREIGN KEY ("origenPuntoRecogidaId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TurnosRelCamiones_tabletId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosRelCamiones"
    ADD CONSTRAINT "TurnosRelCamiones_tabletId_fkey" FOREIGN KEY ("tabletId") REFERENCES "Dispositivos"(id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TurnosRelCamiones_turnoId_fkey; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "TurnosRelCamiones"
    ADD CONSTRAINT "TurnosRelCamiones_turnoId_fkey" FOREIGN KEY ("turnoId") REFERENCES "Turnos"("turnoId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: Turnos_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Turnos"
    ADD CONSTRAINT "Turnos_ibfk_1" FOREIGN KEY ("rutaId") REFERENCES "Rutas"("rutaId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: contribuyentes_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Contribuyentes"
    ADD CONSTRAINT contribuyentes_ibfk_1 FOREIGN KEY ("municipioId") REFERENCES "Municipios"("municipioId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: emails_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Emails"
    ADD CONSTRAINT emails_ibfk_1 FOREIGN KEY ("contribuyenteId") REFERENCES "Contribuyentes"("contribuyenteId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_Cubos_Contribuyentes1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Cubos"
    ADD CONSTRAINT "fk_Cubos_Contribuyentes1" FOREIGN KEY ("contribuyenteId") REFERENCES "Contribuyentes"("contribuyenteId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_Cubos_CubosTipos1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Cubos"
    ADD CONSTRAINT "fk_Cubos_CubosTipos1" FOREIGN KEY ("cubosTiposId") REFERENCES "CubosTipos"("cubosTiposId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_Postes_PostesTipos1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Postes"
    ADD CONSTRAINT "fk_Postes_PostesTipos1" FOREIGN KEY ("postesTiposId") REFERENCES "PostesTipos"("postesTiposId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: fk_Postes_PuntosRecogida1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Postes"
    ADD CONSTRAINT "fk_Postes_PuntosRecogida1" FOREIGN KEY ("puntosRecogidaId") REFERENCES "PuntosRecogida"("puntosRecogidaId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_PuntosDescarga_ResiduosTipos1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosDescarga"
    ADD CONSTRAINT "fk_PuntosDescarga_ResiduosTipos1" FOREIGN KEY ("residuosTiposId") REFERENCES "ResiduosTipos"("residuosTiposId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: fk_PuntosRecogida_PuntosRecogidaTipos2; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "PuntosRecogida"
    ADD CONSTRAINT "fk_PuntosRecogida_PuntosRecogidaTipos2" FOREIGN KEY ("puntosRecogidaTiposId") REFERENCES "PuntosRecogidaTipos"("puntosRecogidaTiposId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: fk_Recogidas_Cubos1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas"
    ADD CONSTRAINT "fk_Recogidas_Cubos1" FOREIGN KEY ("cuboId") REFERENCES "Cubos"("cuboId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_Recogidas_RecogidaTipos1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Recogidas"
    ADD CONSTRAINT "fk_Recogidas_RecogidaTipos1" FOREIGN KEY ("recogidaTipoId") REFERENCES "RecogidaTipos"("recogidaTiposId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: incidencias_ibfk_4; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Incidencias"
    ADD CONSTRAINT incidencias_ibfk_4 FOREIGN KEY ("postesId") REFERENCES "Postes"("postesId") ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: telefonos_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner:
--

ALTER TABLE ONLY "Telefonos"
    ADD CONSTRAINT telefonos_ibfk_1 FOREIGN KEY ("contribuyenteId") REFERENCES "Contribuyentes"("contribuyenteId") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

