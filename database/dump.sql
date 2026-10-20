--
-- PostgreSQL database dump
--

\restrict TToWLxNlrgLJcpgLUlOrI1kChfFsfquk9MFTeP5Inn3iUke0U71SnMnH66S8CBv

-- Dumped from database version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: filmes; Type: TABLE; Schema: public; Owner: sistema
--

CREATE TABLE public.filmes (
    id integer NOT NULL,
    titulo character varying(80) NOT NULL,
    genero character varying(80) NOT NULL,
    diretor character varying(80) NOT NULL,
    ano integer NOT NULL,
    duracao integer NOT NULL,
    nota numeric(3,1)
);


ALTER TABLE public.filmes OWNER TO sistema;

--
-- Name: filmes_id_seq; Type: SEQUENCE; Schema: public; Owner: sistema
--

CREATE SEQUENCE public.filmes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.filmes_id_seq OWNER TO sistema;

--
-- Name: filmes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sistema
--

ALTER SEQUENCE public.filmes_id_seq OWNED BY public.filmes.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: sistema
--

CREATE TABLE public.usuarios (
    email character varying(80) NOT NULL,
    senha character varying(80) NOT NULL
);


ALTER TABLE public.usuarios OWNER TO sistema;

--
-- Name: votos; Type: TABLE; Schema: public; Owner: sistema
--

CREATE TABLE public.votos (
    id integer NOT NULL,
    filme_id integer NOT NULL,
    usuario_email character varying(50) NOT NULL,
    voto character varying(50) NOT NULL
);


ALTER TABLE public.votos OWNER TO sistema;

--
-- Name: votos_id_seq; Type: SEQUENCE; Schema: public; Owner: sistema
--

CREATE SEQUENCE public.votos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.votos_id_seq OWNER TO sistema;

--
-- Name: votos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sistema
--

ALTER SEQUENCE public.votos_id_seq OWNED BY public.votos.id;


--
-- Name: filmes id; Type: DEFAULT; Schema: public; Owner: sistema
--

ALTER TABLE ONLY public.filmes ALTER COLUMN id SET DEFAULT nextval('public.filmes_id_seq'::regclass);


--
-- Name: votos id; Type: DEFAULT; Schema: public; Owner: sistema
--

ALTER TABLE ONLY public.votos ALTER COLUMN id SET DEFAULT nextval('public.votos_id_seq'::regclass);


--
-- Data for Name: filmes; Type: TABLE DATA; Schema: public; Owner: sistema
--

COPY public.filmes (id, titulo, genero, diretor, ano, duracao, nota) FROM stdin;
2	X-man	Sci-fi	jake schreir	2010	1200	4.0
3	Sociedade dos poetas mortos	Drama, comédia	Peter Weir	1989	128	8.2
7	Procurando Doli	Investigação	Tu	67	69	9.9
8	Eu	Eu	Eu	1000	1	10.0
9	Devorador de estrelas	Ficção científica	Phil Lord, Christopher Miller	2026	156	10.0
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: sistema
--

COPY public.usuarios (email, senha) FROM stdin;
pietra@hotmail.com	$2y$12$J0/2XJQeGSD2HPsiURLLJuD2dgPGK3.bfLfMhG2nIhTti2k7MvW2a
marcos@hotmail.com	$2y$12$ronL.h3Lb7IHomLcJPJllOZgPrLlIbkiJxMCt8m0thd84I0NmPw..
john@gmail.com	$2y$12$VRjAlOl/lJwI6ib1TN2u/e5kTNwh5JdXkbSwBItgPPX5.uk2bzkPe
sherlock@gmail.com	$2y$12$1QEWdSvTOAhJMsYKhXBpZenzVvaN.5GbD8m8ykTuhAACZD5bD.jFy
Isabella@hotmail.com	$2y$12$m6Tq/XmHTFG.EzJSA16X7eOFXx0Oi9dqrLJ241VxB8Egq8Ne9x4xm
nicollas.goncalves@edu.senai.br	$2y$12$hHxyDY.2/OPdlzYppzPi1eryGA3RBS91RY9jz3WxRpZsqGobg/wmm
jubataginsou@gmail.com	$2y$12$Y84ruMYNEGzQd840MyYHl.cCXHtmbqHpUtOsRjiv5XHp.GZx2eLW.
marra@gmail.com	$2y$12$rKXw5rcPLTH137EJ0jjYKOf39MAoEA1FPRR/iG2mNd6vstvYVEtm2
isabela@gmail	$2y$12$tLryz0WSEhtpSeqyuwpy.uCcdqCoxJU5KG.BtPqWOhiqscT87pCuK
jebas123@123	$2y$12$mevMwfEYj/.f.3zX//GD8u86OFU2.fB88UOoITaG5Xp.uhQs15IT.
jorge@jorge.com.br	$2y$12$9ZeuFK0BdhHxa3XV0vhOdu.sZg23eDw1bzDl/se0uWTEEaC4CKxpO
sophie.carvalho@gmail.com	$2y$12$1h813iIg8VHB4iOSbFqjo.0j2HBOF4NOEx7Z/VT3do7Zv3z/VQGUu
miguel.s.silva9@edu.senai.br	$2y$12$gNHZ1hN/Wf7Jia7ggr8k5uLqX5KZ67zBkcna311/TYcOC07Q4hvF6
bluezao@amaxurisso.com	$2y$12$aslzsjaNS4bp5UYEICTIq.NrzHN8j87lg5fBhQpWX/Z6zgRmkjTQ.
teste@gmail.com	$2y$12$YZQx0Od192vrqOcxgIto.uut.uz7m8I4xZzVaF6ZaW12InL4WRvSq
oloco@hotmail.com	$2y$12$9/axTIFaEIMdgrvhKKrheO9/i2XPW.aBDuZWBy8e7xkEAfikb3A9S
karlos@protonmail.com	$2y$12$.naRQhh..EKxlRWGndgOLuL/GqDu3rWs4sN7tjpvC7OrSRk7DHVmq
a@hotmail.com	$2y$12$.BTHkX4u/2PHCUpmJ4O5Z.ZuxGdLZJ/vLKs318.ScxqUjDebzORe6
johnW@gmail.com	$2y$12$RGL1JtsV8dwN9VjBDz6dc.lk5dIabuKj9O7NeqIgSgjhh.FWdUOYe
\.


--
-- Data for Name: votos; Type: TABLE DATA; Schema: public; Owner: sistema
--

COPY public.votos (id, filme_id, usuario_email, voto) FROM stdin;
6	2	sherlock@gmail.com	dislike
7	3	sherlock@gmail.com	like
11	3	john@gmail.com	like
22	3	pietra@hotmail.com	dislike
26	7	pietra@hotmail.com	like
27	2	teste@gmail.com	dislike
28	8	pietra@hotmail.com	like
20	2	pietra@hotmail.com	like
29	9	pietra@hotmail.com	like
32	2	a@hotmail.com	like
33	3	a@hotmail.com	like
34	2	johnW@gmail.com	dislike
\.


--
-- Name: filmes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sistema
--

SELECT pg_catalog.setval('public.filmes_id_seq', 9, true);


--
-- Name: votos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sistema
--

SELECT pg_catalog.setval('public.votos_id_seq', 34, true);


--
-- Name: filmes filmes_pkey; Type: CONSTRAINT; Schema: public; Owner: sistema
--

ALTER TABLE ONLY public.filmes
    ADD CONSTRAINT filmes_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: sistema
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (email);


--
-- Name: votos votos_filme_id_usuario_email_key; Type: CONSTRAINT; Schema: public; Owner: sistema
--

ALTER TABLE ONLY public.votos
    ADD CONSTRAINT votos_filme_id_usuario_email_key UNIQUE (filme_id, usuario_email);


--
-- Name: votos votos_pkey; Type: CONSTRAINT; Schema: public; Owner: sistema
--

ALTER TABLE ONLY public.votos
    ADD CONSTRAINT votos_pkey PRIMARY KEY (id);


--
-- Name: votos votos_filme_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sistema
--

ALTER TABLE ONLY public.votos
    ADD CONSTRAINT votos_filme_id_fkey FOREIGN KEY (filme_id) REFERENCES public.filmes(id);


--
-- PostgreSQL database dump complete
--

\unrestrict TToWLxNlrgLJcpgLUlOrI1kChfFsfquk9MFTeP5Inn3iUke0U71SnMnH66S8CBv

