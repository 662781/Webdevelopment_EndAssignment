--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
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


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: _order; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._order (
    id character varying(1) DEFAULT NULL::character varying,
    user_id character varying(1) DEFAULT NULL::character varying,
    date_time character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._order OWNER TO rebasedata;

--
-- Name: _order_line; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._order_line (
    id character varying(1) DEFAULT NULL::character varying,
    order_id character varying(1) DEFAULT NULL::character varying,
    product_id character varying(1) DEFAULT NULL::character varying,
    amount character varying(1) DEFAULT NULL::character varying,
    total_price character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._order_line OWNER TO rebasedata;

--
-- Name: _product; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._product (
    id smallint,
    name character varying(22) DEFAULT NULL::character varying,
    category_id smallint,
    price numeric(2,1) DEFAULT NULL::numeric,
    ingredients character varying(93) DEFAULT NULL::character varying,
    img_path character varying(33) DEFAULT NULL::character varying
);


ALTER TABLE public._product OWNER TO rebasedata;

--
-- Name: _product_cat; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._product_cat (
    id smallint,
    name character varying(12) DEFAULT NULL::character varying,
    description character varying(46) DEFAULT NULL::character varying
);


ALTER TABLE public._product_cat OWNER TO rebasedata;

--
-- Name: _user; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._user (
    id smallint,
    username character varying(14) DEFAULT NULL::character varying,
    email character varying(27) DEFAULT NULL::character varying,
    password character varying(60) DEFAULT NULL::character varying,
    created_at character varying(19) DEFAULT NULL::character varying
);


ALTER TABLE public._user OWNER TO rebasedata;

--
-- Data for Name: _order; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._order (id, user_id, date_time) FROM stdin;
\.


--
-- Data for Name: _order_line; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._order_line (id, order_id, product_id, amount, total_price) FROM stdin;
\.


--
-- Data for Name: _product; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._product (id, name, category_id, price, ingredients, img_path) FROM stdin;
1	Pizza Margherita	2	5.5	Tomato, Basil & Cheese	images/pizza-margarita.png
2	Pizza Rustica	2	6.5	Tomato, Mozzarella, Spicy Minced Meat & Red Pepper	images/pizza-rustica.png
3	Pizza Quattro Formaggi	2	7.5	Gouda Cheese, Provolone, Gorgonzola & Parmesan	images/pizza-quattro-formaggi.png
4	Pasta Bolognese	1	7.5	Bolognese (Meat Sauce), Parmesan & Parsley	images/pasta-bolognese.png
5	Pasta Con Polpette	1	8.5	Tomato, Cherry Tomato, Little Spicy Meatballs, Cream Sauce, Basil, Parsley, Garlic & Parmesan	images/pasta-conpolpette.png
6	Pasta Funghi	1	8.0	Cream Sauce, Mushrooms, Parmesan, Garlic & Parsley	images/pasta-funghi.png
7	Custom Pizza	3	0.0	?	
\.


--
-- Data for Name: _product_cat; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._product_cat (id, name, description) FROM stdin;
1	pasta	This category is all about pasta!
2	pizza	This category is all about pizza!
3	custom-pizza	This category is all about your custom pizzas!
\.


--
-- Data for Name: _user; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._user (id, username, email, password, created_at) FROM stdin;
1	KlaasDeTester	klaas.detester@yahoo.nl	klaasdetester	2022-01-11 10:41:19
2	KlaasdeTester2	klaasdetester2@jamail.nl	$2y$10$qw4ZgXiQLtCuVQUJFFgaxeb0q4wiWgwhxEFTXv.wBcRdjL3WoB5xG	2022-01-24 10:35:46
3	KlaasdeTester3	klaasdetester3@jamail.nl	$2y$10$sK7PSzTAmHlm0V2WcCfeCuEMGqtu27nN5aAi.jb9GUqoI56vAxkxq	2022-01-24 10:48:56
4			$2y$10$TTPTH/gTsdFNZkAcOh3bLebV8xN8q.BfFtGQ3otLC2lNw7xTJLXmm	2022-01-24 14:30:30
5	Lightning	662781@student.inholland.nl	$2y$10$GMFveaNxqFY82be5fNG3Ge0mtwGIyQrBcrgZzi8zx44tj1HY3N89.	2022-01-24 14:35:19
6	KlaasdeTester4	klaasdetester4@jamail.nl	$2y$10$YvTZrTyiENB0tji3Z01sLeK81xIJmdt/mgZEOR1qdItlh6J6NArRK	2022-01-24 14:36:27
\.


--
-- PostgreSQL database dump complete
--

